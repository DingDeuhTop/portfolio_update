<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'skill_id', 'project_id'];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
