<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        return view('home', [
            'page_name' => 'Home Page',
            'name' => 'Laravel 9 Course',
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

    public function sendDetails(Request $request)
    {
        $secret_key = 123321;
        $user_key = $request->user_key;

        $data = [
            'username' => 'Mubarak Khilji',
            'designation' => 'Full stack web developer',
            'mobile' => '01938447680',
            'BankAcc' => 'b12344321',
        ];
        if ($secret_key == $user_key) {
            return response()->json([
                'user_info' => $data,
            ]);
        } else {
            return response([
                'message' => 'Provide valid secret key',
            ]);
        }
    }
}
