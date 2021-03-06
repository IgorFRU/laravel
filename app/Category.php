<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{    
    protected $fillable = ['title', 'description', 'parent_id', 'alias', 'published', 'menu_id'];
    
    //Mutators
    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug(mb_substr($this->title, 0, 60) . "-", "-");
        
        $double = Category::where('alias', $this->attributes['alias'])->first();

        if ($double) {
            $next_id = Category::select('id')->orderby('id', 'desc')->first()['id'];
            $this->attributes['alias'] .= '-' . ++$next_id;
        }
    }
    
    public function children() {
        return $this->hasMany("app\Category", 'parent_id');
    }
    
    public function product() {
        return $this->hasMany(Product::class);
    }

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public static function publishedCount() {
        return Category::where('published', 1)->count();
    }
}
