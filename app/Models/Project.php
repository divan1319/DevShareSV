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
}