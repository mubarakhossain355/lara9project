<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function __invoke(Request $request)
    {
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
}
