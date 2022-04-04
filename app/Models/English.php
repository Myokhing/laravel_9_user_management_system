<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class English extends Model
{
    use HasFactory;
    protected $table = 'englishes';
    protected $fillable = ['title', 'description'];

    public function chapters()
    {
        return $this->belongsToMany(Chapter::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function getRouteKeyName()
    {
        return 'title';
    }
}
