<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberTag extends Model
{
    use HasFactory;

    public function members()
    {
    return $this->belongsToMany(Member::class, 'member_tag_member', 'member_tag_id', 'member_id');
    }
}
