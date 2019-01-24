<?php

namespace Parquet;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
//    protected $guarded = ['id', 'created_at', 'created_at'];
    
    protected $fillable = ['title', 'parent_id', 'alias', 'publoshed'];
    
    //Mutators
    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug(mb_substr($this->title, 0, 40) . "-", "-");
        
    }
    
    public function children() {
        return $this->hasMany("Parquet\Category", 'parent_id');
    }
    
    public function products() {
        return $this->hasMany("Parquet\Product");
    }
}
