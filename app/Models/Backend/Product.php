<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];
    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }
    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function colors() {
        return $this->hasMany(Color::class, 'product_id');
    }

    public function sizes() {
        return $this->hasMany(Size::class, 'product_id');
    }
}
