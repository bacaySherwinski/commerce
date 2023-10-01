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
        
    }
    public function list()
    {
        $data['product'] = $this->product->FindAll();
        return view('pages/list',$data);
    }
    public function view()
    {
        $data['product'] = $this->product->FindAll();
        return view('pages/products',$data);
    }
    public function save()
{
    $id = $this->request->getVar('id'); // Get the product ID from the form

    $data = [
        'name' => $this->request->getVar('name'),
        'description' => $this->request->getVar('description'),
        'image' => $this->request->getVar('image'),
        'price' => $this->request->getVar('price'),
        'category' => $this->request->getVar('category'),
        'quantity' => $this->request->getVar('quantity'),
    ];

    if ($id !== null) {
        // If $id is not null, it means you are updating an existing product
        // Use the ID to update the existing product
        $this->product->set($data)->where('id', $id)->update();
    } else {
        // If $id is null, it means you are adding a new product
        // Save the new product
        $this->product->save($data);
    }

    return redirect()->to('/products');
}

    public function delete($id)
    {
        //echo $id;
        $this->product->delete($id);
        return redirect()->to('/products');
    }

    public function edit($id)
    {
        $data =[
            'product' => $this->product->findAll(),
            'pr' => $this->product->where('id', $id)->first(),
        ];
            return view('pages/products', $data);
    }
}
