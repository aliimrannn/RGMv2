<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academian extends Model
{
    protected $primaryKey = 'StaffID';

    public function ledGrants()
    {
        return $this->hasMany(ResearchGrant::class, 'LeaderID');
    }

    public function memberGrants()
    {
        return $this->belongsToMany(ResearchGrant::class, 'grant_members', 'StaffID', 'GrantID');
    }
}
