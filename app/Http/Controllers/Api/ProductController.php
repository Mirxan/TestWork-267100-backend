<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProductRequest;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;


class ProductController extends BaseController 
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) 
    {
        $this->productRepository = $productRepository;
    }

    public function index() 
    {
        return $this->sendResponse($this->productRepository->getAllProducts());
    }

    public function store(ProductRequest $request) 
    {
        $newProduct = $request->only([
            'title',
            'desciption'
        ]);
        return $this->sendResponse($this->productRepository->createProduct($newProduct));
    }

    public function update(ProductRequest $request) 
    {
        $productId = $request->route('id');
        $newProduct = $request->only([
            'title',
            'desciption'
        ]);
        return $this->sendResponse($this->productRepository->updateProduct($productId, $newProduct));
    }

    public function destroy(Request $request) 
    {
        $productId = $request->route('id');
        $this->productRepository->deleteProduct($productId);

        return $this->sendResponse(null);
    }
}
