<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Advertising extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'category_id',
        'body',
        'slug',
        'description',
        'title',
    ];
//    public function user()
//    {
//        $this->belongsTo(User::class);
//    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function address(): hasOne
    {
        return $this->hasOne(Address::class);
    }

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class, 'advertising_id');
    }

    public function Image(): HasMany
    {
        return $this->hasMany('Image');
    }


}
