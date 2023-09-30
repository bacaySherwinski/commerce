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
    public function view()
    {
        $data['product'] = $this->product->FindAll();
        return view('pages/products',$data);
    }
    public function save()
    {
        $id =$_POST['id'];
        $data = [
            'name'=>$this->request->getVar('name'),      
            'description'=>$this->request->getVar('description'),
            'image' => $this->request->getVar('image'),
            'price'=>$this->request->getVar('price'),
            'category'=>$this->request->getVar('category'),
            'quantity'=>$this->request->getVar('quantity'),
            ];
            if($id!= null){
                $this->product->set($data)->where('id', $id)->update();
            }else{
           
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
}
