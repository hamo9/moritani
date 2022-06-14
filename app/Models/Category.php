<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];

    protected $table = 'categories';
    public $timestamps = true;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function sub_category()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function scopeRemove($query)
    {
        return $query->where('remove',0);
    }

    public function scopeRestore($query)
    {
        return $query->where('remove',1);
    }


    public function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    
     public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
