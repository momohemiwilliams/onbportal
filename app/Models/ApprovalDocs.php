<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalDocs extends Model
{
    protected $table = 'approval_docs';

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
