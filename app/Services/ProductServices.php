<?php

namespace App\Services;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductServices 
{

  public function list()
  {
    $products = Product::paginate(); // paginate(15) is default
    
    return $products;
  }

  public function store(ProductStoreRequest $request)
  {
    $product = DB::transaction(function () use ($request) {
      $product_data = $request->except('sku');
      $product_data['slug'] = Str::slug($product_data['name']);

      $product = Product::create($product_data);
      
      $skus = $product->skus()->createMany($request->get('sku'));

      foreach ($skus as $key => $sku) {
        foreach ($request->sku[$key]['images'] as $index => $image) {
          $path = $image['url']->store('products');

          $sku->images()->create([
            'url' => $path,
            'is_cover' => $index === 0,
          ]);
        }
      }

      return $product->load('skus.images');
    });

    return $product;
  }

  public function update(ProductUpdateRequest $request, Product $product)
  {
    $product->update($request->validated());
    
    return $product;
  }

  public function destroy(Product $product)
  {
    $product->delete();
  }
}