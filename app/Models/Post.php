<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'image_path', 'user_id'];

    public static function uploadImage($image){
        $path = Storage::disk('public')->putFile('/images', $image);
        $exploded = explode('/', $path);
        return $exploded[count($exploded) - 1];
    }

    public static function deleteImage($image){
        Storage::disk('public')->delete('/images' . $image);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
