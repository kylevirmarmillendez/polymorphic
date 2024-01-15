<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function photos(){
        return $this->morphMany(Photo::class,'imageable');
    }
}
