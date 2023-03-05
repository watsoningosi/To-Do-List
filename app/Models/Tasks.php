<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function getTaskDefaultAttribute()
    {
        return '/assets/images/default.png';
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'task_id');
    }
}
