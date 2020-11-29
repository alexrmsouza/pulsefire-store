<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        return new Response("response", 200);
    }

    public function store(Request $request): Response
    {
        return new Response("response", 200);
    }

    public function show(int $id): Response
    {
        return new Response($id, 200);
    }

    public function update(Request $request, int $id): Response
    {
        return new Response($id, 200);
    }

    public function destroy(int $id): Response
    {
        return new Response($id, 200);
    }
}
