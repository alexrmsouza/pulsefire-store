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
            "category" => "destaques",
        ],
        [
            "id" => 2,
            "name" => "Produto 2",
            "price" => 69.99,
            "category" => "destaques",
        ],
        [
            "id" => 3,
            "name" => "Produto 3",
            "price" => 79.99,
            "category" => "destaques",
        ],
        [
            "id" => 4,
            "name" => "Produto 4",
            "price" => 89.99,
            "category" => "destaques",
        ],
        [
            "id" => 5,
            "name" => "Produto 5",
            "price" => 69.99,
            "category" => "destaques",
        ],
        [
            "id" => 6,
            "name" => "Produto 6",
            "price" => 79.99,
            "category" => "destaques",
        ],
        [
            "id" => 7,
            "name" => "Produto 7",
            "price" => 89.99,
            "category" => "destaques",
        ],
        [
            "id" => 8,
            "name" => "Produto 8",
            "price" => 69.99,
            "category" => "destaques",
        ],
        [
            "id" => 9,
            "name" => "Produto 9",
            "price" => 79.99,
            "category" => "destaques",
        ],
        [
            "id" => 10,
            "name" => "Produto 10",
            "price" => 89.99,
            "category" => "destaques",
        ],
        [
            "id" => 11,
            "name" => "Produto 11",
            "price" => 69.99,
            "category" => "destaques",
        ],
        [
            "id" => 12,
            "name" => "Produto 12",
            "price" => 79.99,
            "category" => "destaques",
        ],
        [
            "id" => 13,
            "name" => "Produto 13",
            "price" => 89.99,
            "category" => "destaques",
        ],
        [
            "id" => 14,
            "name" => "Produto 14",
            "price" => 69.99,
            "category" => "destaques",
        ],
        [
            "id" => 15,
            "name" => "Produto 15",
            "price" => 79.99,
            "category" => "destaques",
        ],
        [
            "id" => 16,
            "name" => "Produto 16",
            "price" => 89.99,
            "category" => "destaques",
        ],
        [
            "id" => 17,
            "name" => "Produto 17",
            "price" => 69.99,
            "category" => "destaques",
        ],
        [
            "id" => 18,
            "name" => "Produto 18",
            "price" => 79.99,
            "category" => "destaques",
        ],
        [
            "id" => 19,
            "name" => "Produto 19",
            "price" => 89.99,
            "category" => "destaques",
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

    public function searchAction(string $query)
    {
        $products = [];

        foreach ($this->products as $product) {
            $nameOrCategory = false !== strpos($product['name'], $query);
            $nameOrCategory |= false !== strpos($product['category'], $query);

            if ($nameOrCategory) {
                $products[] = $product;
            }
        }

        return $products;
    }
}
