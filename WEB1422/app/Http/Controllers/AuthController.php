<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function user(Request $request){
        $dataJson = [
            'name' => 'Anh Hieu DZ',
            'tuoi' => 10
        ];
        return response()->json($dataJson);
    }
}
