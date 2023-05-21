<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'birthdate',
    ];

    public function memberTags()
    {
        return $this->belongsToMany(MemberTag::class, 'member_tag_member', 'member_id', 'member_tag_id');
    }
}
