<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // public function skill()
    // {
    //     return $this->belongsTo(Skill::class);
    // }

    public function owners()
    {
        return $this->hasManyThrough(Owner::class, Project::class);
    }
}
