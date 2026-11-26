<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppMonitor extends Model
{
    protected $table = 'app_monitor';

    protected $fillable = [
        'app_code',
        'app_status',
        'app_time',
        'dsd_user_id',
        'dsd_user_name',
        'dsd_status',
        'dsd_user_time',
        'meg_user_id',
        'meg_user_name',
        'meg_status',
        'meg_user_time',
        'dod_user_id',
        'dod_user_name',
        'dod_status',
        'dod_user_time',
        'icg_user_id',
        'icg_user_name',
        'icg_status',
        'icg_user_time',
    ];

    public function application()
    {
        return $this->belongsTo(MemberOnboarding::class, 'app_code', 'app_code');
    }
}
