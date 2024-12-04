<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $table = 'technology';
    protected $fillable = ['id', 'name', 'category', 'icon_path'];
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_technology');
    }
}
