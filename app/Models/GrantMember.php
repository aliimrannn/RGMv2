<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrantMember extends Model
{
    protected $table = 'grant_members';
    public $incrementing = false;

    protected $fillable = ['GrantID', 'StaffID'];
}
