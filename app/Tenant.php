<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'shopName',
        'lotNo',
        'floor',
        'zone_id',
        'category_id',
        'description'
      ];

      public function Zone()    {
          return $this -> belongsTo(Zone::class);
      }

      public function Category()    {
          return $this -> belongsTo(Category::class);
      }
}
