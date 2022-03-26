<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $fruits = array('Mango', 'Orange', 'Banana', 'Apple', 'Pineapple');

        return view('welcome', [
            'fruits' => $fruits
        ]);
    }
    public function addProduct()
    {
        $products = [
            ['id' => 2, 'name' => 'Phone'],
            ['id' => 3,  'name' =>  'Tablet'],
            ['id' => 4, 'name' =>  'Laptops'],
            ['id' => 5,  'name' =>  'Computer'],
            ['id' => 6,   'name' =>  'Printer']
        ];

        Product::insert($products);

        return "Product has been inserted successfully";
    }

    public function searchProduct()
    {
        return view('Product.search');
    }

    public function autocomplete(Request $request)
    {
        $data = Product::select('name')
            ->where('name', 'LIKE', "%{$request->terms}%")
            ->get();
        return response()->json($data);
    }
}
