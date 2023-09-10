<?php

namespace App\Models;

use App\Http\Resources\CategoryResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_category',
        'parent',
        'sort',
        'status',
    ];

    public function advertisings()
    {
        return $this->hasMany(Advertising::class, 'category_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

//    public function children()
//    {
//        return $this->hasMany(Category::class, 'parent');
//    }
//    public function parent()
//    {
//        return $this->belongsTo(Category::class, 'parent');
//    }

}
