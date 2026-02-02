<?php
namespace App\Http\Controllers\Supportportal;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function list()
    {
        return view('supportportal.products.list');
    }
}
