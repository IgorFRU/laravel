<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = ['article_name', 'img', 'alias', 'description', 'published'];

    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug(mb_substr($this->article_name, 0, 60) . "-", "-");
        
        $double = Article::where('alias', $this->attributes['alias'])->first();

        if ($double) {
            $next_id = Article::select('id')->orderby('id', 'desc')->first()['id'];
            $this->attributes['alias'] .= '-' . ++$next_id;
        }
    }
}
