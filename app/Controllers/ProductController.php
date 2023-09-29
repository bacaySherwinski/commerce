<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    private $product;
    public function __construct()
    {
        $this->product = new \App\Models\ProductModel();
    }
    public function index()
    {
        //
    }
    public function view()
    {
        $data['product'] = $this->product->FindAll();
        return view('pages/products',$data);
    }
}
