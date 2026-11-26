<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    protected $table = 'applicationstatus';

    protected $fillable = ['status', 'note', 'app_code', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // public function group()
    // {
    //     return $this->hasOne(User::class);
    // }
}
