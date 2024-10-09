<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['gallary_id','user_id', 'category_id','title','description','status'];

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    // One-to-Many inverse relationship with User model
    public function user() {
        return $this->belongsTo(User::class);
    }
}
