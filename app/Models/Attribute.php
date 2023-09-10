<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_attribute'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
