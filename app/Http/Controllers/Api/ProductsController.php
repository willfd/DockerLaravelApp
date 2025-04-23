<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest\PostRequest;
use App\Models\Product;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProductsController extends Controller
{
    public function __construct() {
        //
    }

    public function index(): string{
        $products = Product::query()->get();
        return json_encode($products);
    }

    public function show(int $id): string{
        $product = Product::query()->find($id);
        return json_encode($product);
    }

    public function create(PostRequest $request): string{
        $product = new Product(
            [
                'name'=>$request->all()['name']
            ]
        );
        return $product->save();
    }

    public function update(int $id, PostRequest $request): string{
        $product = Product::query()->find($id);
        if(!$product){
            return new Response(ResponseAlias::HTTP_NOT_FOUND, 'Product not found for id '.$id);
        }
        $product->name = $request->all()['name'];
        return $product->save();
    }

    public function destroy(int $id): string{
        return Product::query()->find($id)->delete();
    }

}
