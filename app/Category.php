<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
//    protected $guarded = ['id', 'created_at', 'created_at'];
    
    protected $fillable = ['title', 'parent_id', 'alias', 'published'];
    
    //Mutators
    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug(mb_substr($this->title, 0, 60) . "-", "-");
        
        $double = Category::where('alias', $this->attributes['alias'])->first();

        if ($double) {
            //Добавляем к алиасу id

            $next_id = Category::select('id')->orderby('id', 'desc')->first()['id'];
            $this->attributes['alias'] .= '-' . ++$next_id;
        }


    }
    
    public function children() {
        return $this->hasMany("app\Category", 'parent_id');
    }
    
    public function products() {
        return $this->hasMany("app\Product");
    }

}
