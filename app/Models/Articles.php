<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $table = 'articles';

    protected $fillable = [
        'user_id',
        'categories_id',
        'title',
        'content',
        'image',
    ];

    public function categories(){
        return $this->hasMany(Categories::class);
    }
}
