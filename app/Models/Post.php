<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'sub_title',
        'description',
        'category_id',
        'status',
        'thumbnail'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
