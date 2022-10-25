<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function jobs() {
        return $this->hasMany(PublicApp::class, 'job_id', 'id');
    }
}