<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $table = 'ads';
    public $timestamps = true;

    protected $guarded = [];

    public function scopeRestore($query)
    {
        return $query->where('remove',1);
    }

    public function scopeRemove($query)
    {
        return $query->where('remove',0);
    }

    public function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
