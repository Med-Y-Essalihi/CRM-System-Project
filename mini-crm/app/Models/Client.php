<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'company', 'notes', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    // In Client model
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
