<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        [
            "id" => 1,
            "name" => "Produto 1",
            "price" => 49.99,
        ],
        [
            "id" => 2,
            "name" => "Produto 2",
            "price" => 69.99,
        ],
        [
            "id" => 3,
            "name" => "Produto 3",
            "price" => 79.99,
        ],
        [
            "id" => 4,
            "name" => "Produto 4",
            "price" => 89.99,
        ],
    ];

    public function listAction()
    {
        return $this->products;
    }

    public function getAction(int $productId)
    {
        foreach ($this->products as $product) {
            if ($product['id'] === $productId) {
                return $product;
            }
        }

        return [];
    }
}
