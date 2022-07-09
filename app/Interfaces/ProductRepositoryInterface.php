<?php

namespace App\Interfaces;

interface ProductRepositoryInterface 
{
    public function getAllProducts();
    public function getProductById($id);
    public function createProduct(array $products);
    public function updateProduct($id, array $newproduct);
    public function deleteProduct($id);
}