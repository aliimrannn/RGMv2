<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchGrant extends Model
{
    protected $primaryKey = 'GrantID';

    public function leader()
    {
        return $this->belongsTo(Academian::class, 'LeaderID');
    }

    public function milestones()
    {
        return $this->hasMany(ProjectMilestone::class, 'GrantID');
    }

    public function members()
    {
        return $this->belongsToMany(Academian::class, 'grant_members', 'GrantID', 'StaffID');
    }
}
