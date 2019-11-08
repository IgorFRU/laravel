<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Product extends Model
{
    // protected $guarded = ['id', 'inner_scu', 'alias', 'created_at', 'created_at'];
    protected $fillable = ['scu', 'product_name', 'slug', 'category_id', 'manufacture_id', 
                            'currency_id', 'price', 'sale', 'rebate', 'short_description',
                            'description', 'meta_title', 'meta_description', 'meta_keywords',
                            'published', 'recomended', 'sample', 'unit_id', 'packaging_sales',
                            'in_package'];

    public function setSlugAttribute($value) {
        if ($this->attributes['slug'] == '') {
            $this->attributes['slug'] = Str::slug(mb_substr($this->product_name, 0, 60) . "-", "-");
            $this->attributes['slug'] .= '-' . $this->attributes['scu'];
            $double = Product::where('slug', $this->attributes['slug'])->first();

            if ($double) {
                $next_id = Product::select('id')->orderby('id', 'desc')->first()['id'];
                $this->attributes['slug'] .= '-' . ++$next_id;
            }
        }        
    }

    public function toRub() {

    }

    public function getCurrencyIdAttribute($value) {
        return $this->attributes['currency_id'];
        // return $value;
    }

    public function manufacture() {
        return $this->belongsTo(Manufacture::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function currencyrate() {
        return $this->belongsTo(Currencyrate::class, 'currency_id');
    }
    
    public function unit() {
        return $this->belongsTo(Unit::class);
    }
    
    public function rebate() {
        return $this->belongsTo(Rebate::class);
    }

    public function images() {
        return $this->belongsToMany(Image::class);
    }

    public static function publishedCount() {
        return Product::where('published', 1)->count();
    }
}
