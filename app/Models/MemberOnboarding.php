<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MemberOnboarding extends Model
{
    protected $table = 'onboardingformtemp';

    public const STATUS_STEP1 = 1;
    public const STATUS_STEP2 = 2;
    public const STATUS_STEP3 = 3;
    public const STATUS_STEP4 = 4;
    public const STATUS_STEP5 = 45;
    public const STATUS_SUBMITTED = 5;       // Pending DSD Review
    public const STATUS_DOD_REJECTED = 6;    // Rejected by DOD -> back to MEG
    public const STATUS_MEG_APPROVED = 7;    // Approved by MEG -> Pending DOD
    public const STATUS_DOD_APPROVED = 8;    // Approved by DOD (Account Created) -> Pending ICG
    public const STATUS_REJECTED = 9;        // Rejected by DSD or MEG -> Participant
    public const STATUS_ICG_VERIFIED = 10;   // Verified / Completed by ICG
    public const STATUS_DSD_APPROVED = 11;   // Approved by DSD -> Pending MEG

    public const EDITABLE_STATUSES = [
        self::STATUS_STEP1,
        self::STATUS_STEP2,
        self::STATUS_STEP3,
        self::STATUS_STEP4,
        self::STATUS_STEP5,
        self::STATUS_REJECTED,
    ];

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'app_code',
        'eligibility_type',
        'eligibility_sub_type',
        'eligibility_other',
        'institution_name',
        'approval_status',
        'max_step_completed',
    ];

    protected $casts = [
        'certified_correct' => 'boolean',
        'payment_confirmed' => 'boolean',
        'max_step_completed' => 'integer',
    ];

    // ==================== RELATIONSHIPS ====================

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function monitor()
    {
        return $this->hasOne(AppMonitor::class, 'app_code', 'app_code');
    }

    public function statuses()
    {
        return $this->hasMany(ApplicationStatus::class, 'app_code', 'app_code')->orderBy('created_at', 'desc');
    }

    public function approvalDocs()
    {
        return $this->hasMany(ApprovalDocs::class, 'app_code', 'app_code');
    }

    public function rejectionDocs()
    {
        return $this->hasMany(RejectlDocs::class, 'app_code', 'app_code');
    }

    // ==================== SCOPES ====================

    public function scopeSubmitted(Builder $query): Builder
    {
        return $query->where('approval_status', '>=', self::STATUS_SUBMITTED)
            ->where('approval_status', '!=', self::STATUS_STEP5);
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->whereIn('approval_status', [self::STATUS_DOD_APPROVED, self::STATUS_ICG_VERIFIED]);
    }

    public function scopeForInternalRole(Builder $query, string $role): Builder
    {
        switch (strtoupper($role)) {
            case 'MEG':
                return $query->whereIn('approval_status', [
                    self::STATUS_DSD_APPROVED,
                    self::STATUS_MEG_APPROVED,
                    self::STATUS_DOD_APPROVED,
                    self::STATUS_ICG_VERIFIED,
                    self::STATUS_DOD_REJECTED,
                ]);
            case 'DOD':
                return $query->whereIn('approval_status', [
                    self::STATUS_MEG_APPROVED,
                    self::STATUS_DOD_APPROVED,
                    self::STATUS_ICG_VERIFIED,
                    self::STATUS_DOD_REJECTED,
                ]);
            case 'ICG':
                return $query->whereIn('approval_status', [
                    self::STATUS_DOD_APPROVED,
                    self::STATUS_ICG_VERIFIED,
                ]);
            case 'DSD':
            default:
                return $query->submitted();
        }
    }

    // ==================== HELPERS ====================

    public static function metricsForRole(string $role): array
    {
        $role = strtoupper($role);
        $allCount = self::forInternalRole($role)->count();
        $completedCount = self::completed()->count();

        if ($role === 'MEG') {
            return [
                'all' => $allCount,
                'completed' => $completedCount,
                'verified' => self::where('approval_status', self::STATUS_ICG_VERIFIED)->count(),
                'dsd_approval' => 'N/A',
                'meg_approval' => self::where('approval_status', self::STATUS_DSD_APPROVED)->count(),
                'dod_approval' => 'N/A',
            ];
        }

        if ($role === 'DOD') {
            return [
                'all' => $allCount,
                'completed' => $completedCount,
                'verified' => self::where('approval_status', self::STATUS_ICG_VERIFIED)->count(),
                'dsd_approval' => 'N/A',
                'meg_approval' => 'N/A',
                'dod_approval' => self::where('approval_status', self::STATUS_MEG_APPROVED)->count(),
            ];
        }

        if ($role === 'ICG') {
            return [
                'all' => $allCount,
                'completed' => $completedCount,
                'verified' => self::where('approval_status', self::STATUS_DOD_APPROVED)->count(),
                'dsd_approval' => 'N/A',
                'meg_approval' => 'N/A',
                'dod_approval' => 'N/A',
            ];
        }

        return [
            'all' => $allCount,
            'completed' => $completedCount,
            'verified' => self::where('approval_status', self::STATUS_ICG_VERIFIED)->count(),
            'dsd_approval' => self::where('approval_status', self::STATUS_SUBMITTED)->count(),
            'meg_approval' => self::where('approval_status', self::STATUS_DSD_APPROVED)->count(),
            'dod_approval' => self::where('approval_status', self::STATUS_MEG_APPROVED)->count(),
        ];
    }

    public function isEditable(): bool
    {
        return in_array((int) $this->approval_status, self::EDITABLE_STATUSES, true);
    }

    public function displayEligibilityType(): string
    {
        if ($this->eligibility_type === 'Capital Market Operator' && !empty($this->eligibility_sub_type)) {
            if ($this->eligibility_sub_type === 'Others (Please indicate)' && !empty($this->eligibility_other)) {
                return 'Capital Market Operator - ' . $this->eligibility_other;
            }
            return $this->eligibility_sub_type;
        }

        return $this->eligibility_type ?? 'Participant';
    }

    public function completedTrackerSteps(): int
    {
        $max = (int) ($this->max_step_completed ?? 0);
        if ($max > 0) {
            return min($max, 5);
        }

        $status = (int) $this->approval_status;
        if ($status >= 5) {
            return 5;
        }
        return min($status, 5);
    }

    public function trackerPercentage(): int
    {
        return (int) (($this->completedTrackerSteps() / 5) * 100);
    }

    public function statusLabel(): string
    {
        switch ((int) $this->approval_status) {
            case self::STATUS_STEP1:
            case self::STATUS_STEP2:
            case self::STATUS_STEP3:
            case self::STATUS_STEP4:
            case self::STATUS_STEP5:
                return 'Application Not Completed';
            case self::STATUS_SUBMITTED:
                return 'Pending DSD Approval';
            case self::STATUS_DSD_APPROVED:
                return 'Pending MEG Approval';
            case self::STATUS_MEG_APPROVED:
                return 'Pending DOD Approval';
            case self::STATUS_DOD_APPROVED:
            case self::STATUS_ICG_VERIFIED:
                return 'Completed & Approved';
            case self::STATUS_DOD_REJECTED:
                return 'Returned by DOD to MEG';
            case self::STATUS_REJECTED:
                return 'Rejected - Action Required';
            default:
                return 'In Progress';
        }
    }
}
