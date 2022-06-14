<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name'];

    protected $table = 'sub_categories';
    public $timestamps = true;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'subCategory_id');
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
}
