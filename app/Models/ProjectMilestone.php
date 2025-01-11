<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $primaryKey = 'MilestoneID';

    public function grant()
    {
        return $this->belongsTo(ResearchGrant::class, 'GrantID');
    }
}
