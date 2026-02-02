<?php

namespace App\Http\Controllers\Supportportal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $lang = [
            'products_list' => 'Products List',
            'product' => 'Product'
        ];
        return view('supportportal.products.list', compact('lang'));
    }
    
    public function datatableList(Request $request)
    {
        // TODO: Return products data for DataTable
        return response()->json([
            'draw' => 1,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'data' => []
        ]);
    }
    
    public function create()
    {
        return view('supportportal.products.create');
    }
    
    public function store(Request $request)
    {
        // TODO: Store product logic
        return redirect()->route('products.list');
    }
    
    public function details($id)
    {
        // TODO: Product details logic
        return view('supportportal.products.details');
    }
    
    public function edit($id)
    {
        // TODO: Edit product form
        return view('supportportal.products.edit');
    }
    
    public function update(Request $request)
    {
        // TODO: Update product logic
        return redirect()->route('products.list');
    }
    
    public function delete(Request $request)
    {
        // TODO: Delete products logic
        return response()->json(['status' => 'success']);
    }
}
