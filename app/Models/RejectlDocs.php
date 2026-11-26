<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RejectlDocs extends Model
{
    protected $table = 'reject_docs';

    protected $fillable = ['app_code', 'user_id', 'document'];

    public function application()
    {
        return $this->belongsTo(MemberOnboarding::class, 'app_code', 'app_code');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
