<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Manufacture extends Model
{
    protected $fillable = ['manufacture', 'slug', 'published', 'image_id', 'description'];

    //Mutators
    public function setAliasAttribute($value) {

        $this->attributes['slug'] = Str::slug(mb_substr($this->manufacture, 0, 60) . "-", "-");
    }

    public function product() {
        return $this->hasMany(Product::class);
    }

    public static function publishedCount() {
        return Manufacture::where('published', 1)->count();
    }
}
