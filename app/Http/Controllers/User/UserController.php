<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Application;

class UserController extends Controller
{
    public function index(){
        $products = Product::with("brand","category",'product_images')->orderBy('id','desc')->limit(8)->get();
        return Inertia::render('User/index',[
            'canLogin' => app('router')->has('login'),
            'canRegister' =>app('router')->has('register'),
            'laravelversion'=> Application::VERSION,
            'phpversion' => PHP_VERSION,
            'products' => $products
        ]);
    }
}
