<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Advertise extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'user', 'category'];
    protected $with = ['creator', 'cat'];

    public function creator(){
    	return $this->belongsTo(User::class, 'user', 'id');
    }

    public function cat(){
    	return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function Shots(){
    	return $this->hasMany(Shots::class, 'adertise', 'id');
    }
}