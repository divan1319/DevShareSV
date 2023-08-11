<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'repo',
        'privacy',
        'status',
        'limit_requets',
        'user_id',
        'created_at'
    ];

    public $timestamps = false;
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class,'project_technology','project_id','technology_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'projects_users','project_id','user_id')->using(ProjectUser::class)->withPivot('role_id');
    } 
}