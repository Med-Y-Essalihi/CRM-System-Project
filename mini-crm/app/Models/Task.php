<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

        protected $fillable = ['title', 'description', 'due_date', 'status', 'client_id'];
        protected $dates = ['due_date'];

        public function client()
        {
            return $this->belongsTo(Client::class);
        }
        public function user()
        {
            return $this->belongsTo(User::class);
        }

    // Add any necessary relationships or fillables
}
