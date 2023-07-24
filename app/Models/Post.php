<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    Public Function user(){
        return $this->belongsTo(User::class);
    }
    Public Function category(){
        return $this->belongsTo(Category::class);
    }
}
