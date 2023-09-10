<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'advertising_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function advertising()
    {
        return $this->belongsTo(Advertising::class);
    }
}
