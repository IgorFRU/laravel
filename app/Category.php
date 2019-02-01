<?php

namespace Parquet;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
//    protected $guarded = ['id', 'created_at', 'created_at'];
    
    protected $fillable = ['title', 'parent_id', 'alias', 'published'];
    
    //Mutators
    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug(mb_substr($this->title, 0, 40) . "-", "-");
        
        $double = Category::where('alias', $this->attributes['alias'])->first();

        if ($double) {
            //Добавляем к алиасу id

            $next_id = Category::select('id')->orderby('id', 'desc')->first()['id'];
            $this->attributes['alias'] .= '-' . ++$next_id;
        }


    }
    
    public function children() {
        return $this->hasMany("Parquet\Category", 'parent_id');
    }
    
    public function products() {
        return $this->hasMany("Parquet\Product");
    }

    public function countProducts() {
        return $this->hasMany("Parquet\Product");
    }
}
