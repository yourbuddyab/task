<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'text', 'user_id'
    ];

    public function user()
    {
        return $this->toBelong(User::class);
    }
}
