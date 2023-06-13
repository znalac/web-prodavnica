<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Product extends Model
{
    use HasFactory,HasSlug;
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
    
  public function category()
  {
      return $this->belongsTo(Category::class);
  }
  public function getSlugOptions() : SlugOptions
  {
      return SlugOptions::create()
          ->generateSlugsFrom('product_name')
          ->saveSlugsTo('slug');
  }

  public function getRouteKeyName()
  {
      return 'slug';
  }
    
}
