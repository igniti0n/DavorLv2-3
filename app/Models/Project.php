<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'price', 'works_done', 'start_date', 'end_date'];

    public function users() {
        $user_id = Auth::user()->getId();
        return $this->belongsToMany('App\Models\User', 'project_users')->wherePivot('user_id', $user_id);
    }
}
