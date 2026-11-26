<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateAccountOnform extends Model
{
    protected $table = 'PA_Form';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
