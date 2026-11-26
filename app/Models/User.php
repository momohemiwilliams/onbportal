<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'institution_id',
        'usertype',
        'group_id',
        'eligibility_type',
        'eligibility_sub_type',
        'eligibility_other',
        'password',
        'is_email_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'lockout_time' => 'datetime',
        'password_changed_at' => 'datetime',
        'is_email_verified' => 'boolean',
    ];

    public function verifyUser()
    {
        return $this->hasOne(VerifyUser::class);
    }

    public function applications()
    {
        return $this->hasMany(MemberOnboarding::class, 'user_id');
    }

    public function latestApplication()
    {
        return $this->hasOne(MemberOnboarding::class, 'user_id')->latest('id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }

    public function isExternal(): bool
    {
        return $this->usertype === 'external';
    }

    public function isInternal(): bool
    {
        return $this->usertype === 'internal';
    }

    public function internalGroupCode(): string
    {
        $groupName = strtoupper((string) optional($this->group)->name);
        if (in_array($groupName, ['DSD', 'MEG', 'DOD', 'ICG'], true)) {
            return $groupName;
        }

        if ($this->hasRole('DsdAdmin')) {
            return 'DSD';
        }
        if ($this->hasRole('MegAdmin')) {
            return 'MEG';
        }
        if ($this->hasRole('DodAdmin')) {
            return 'DOD';
        }
        if ($this->hasRole('IcgAdmin')) {
            return 'ICG';
        }

        return 'DSD';
    }
}
