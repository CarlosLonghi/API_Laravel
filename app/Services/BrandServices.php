<?php

namespace App\Services;

use App\Models\Brand;

class BrandServices 
{

  public function list()
  {
    $brands = Brand::paginate(); // paginate(15) is default
    return $brands;
  }
}