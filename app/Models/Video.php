<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Video extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title','body'];

    protected $table = 'videos';
    public $timestamps = true;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }



    public function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
