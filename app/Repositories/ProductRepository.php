<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product\Product;

class ProductRepository implements ProductRepositoryInterface 
{
    public function getAllProducts() 
    {
        return Product::all();
    }

    public function getProductById($ProductId) 
    {
        return Product::findOrFail($ProductId);
    }

    public function deleteProduct($ProductId) 
    {
        Product::destroy($ProductId);
    }

    public function createProduct(array $ProductInfo) 
    {
        return Product::create($ProductInfo);
    }

    public function updateProduct($ProductId, array $newProduct) 
    {
        return Product::whereId($ProductId)->update($newProduct);
    }

}
