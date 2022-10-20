<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;

class FrontController extends Controller
{
    public function home()
    {
        $users = User::where('created_at', '<=', now())->get();
        $categories = Category::all();

        return view('home', [
            'page_name' => 'Home Page',
            'name' => 'Laravel 9 Course',
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    public function about()
    {
        return view('about', [
            'page_name' => 'About Page',
            'name' => 'Laravel 9 Course',
        ]);
    }

    public function service()
    {
        $services = [
            'Web Design',
            'Web Development',
            'App Development',
            'Graphics Design',
        ];
        return view('service', compact('services'));
    }

    public function contact()
    {
        $page_name = 'Contact Page';
        $products = [
            1 => [
                'name' => 'Bag',
                'color' => 'black',
                'price' => '1200',
            ],
            2 => [
                'name' => 'Sunglass',
                'color' => 'black',
                'price' => '700',
            ],
        ];
        $product_count = count($products);
        $color = 'red';

        return response()->json([

            'products' => $products,
            'products_count' => $product_count,
        ], 200)->header('Content-type', 'application/json')
            ->cookie('My_ID_Card', 'Mubarak Khilji', 3600);
        // return view('contact', compact(
        //     'page_name',
        //     'product_count',
        //     'color',
        //      'products'));
    }

}
