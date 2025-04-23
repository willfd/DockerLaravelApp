<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function __construct() {
        //
    }

    public function index(): string{
        $products = [
            [
                'id' => 1,
                'name' => 'dog bed'
            ],
            [
                'id' => 2,
                'name' => 'cat bed'
            ]
        ];
        return json_encode($products);
    }

    public function show(int $id): string{
        return json_encode(
            [
                'id' => $id,
                'name' => 'dog bed'
            ]
        );
    }

    public function create(): string{
        return true;
    }

    public function update(int $id): string{
        return true;
    }

    public function destroy(int $id): string{
        return true;
    }

}
