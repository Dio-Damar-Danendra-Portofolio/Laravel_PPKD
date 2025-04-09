<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Orders;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class TransactionController extends Controller
{
    public function index(){
        $title = "Order List";
        $orders = Orders::orderBy('id', 'desc')->get();
        return view('pos.index', compact('title', 'orders'));
    }

    public function create()
    {
        $title = "Add New Order";
        $categories = Categories::orderBy('id', 'desc')->get();
        $products = Products::orderBy('id', 'desc')->get();
        return view('pos.create', compact('title', 'categories', 'products'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'qty' => $request->qty,
            'order_status' => $request->order_status,
            'order_change' => $request->order_change,
            'product_price' => $request->product_price,
            'is_active' => $request->is_active
        ];

        if ($request->hasFile('product_photo')) {
            $photo = $request->file('product_photo')->store('product', 'public');
            $data['product_photo'] = $photo;
        }
        Orders::create($data);

        toast('Product Data Successfully Added!', 'success');


        return redirect()->to('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Products::findOrFail($id);
        $title = "Edit Product";
        $categories = Categories::orderBy('id', 'desc')->get();
        return view('products.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'is_active' => $request->is_active
        ];

        $product = Products::findOrFail($id);
        if ($request->hasFile('product_photo')) {
            File::delete(public_path('storage/'.$product->photo));
        }

        $photo = $request->file('product_photo')->store('products', 'public');
        $data['product_photo'] = $photo;

        $product->update($data);

        toast('Product Data Successfully Updated!', 'success');

        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        File::delete(public_path('storage/'.$product->product_photo));
        $product->delete();
        toast('Product Data Successfully Deleted!', 'success');
        return redirect()->to('products')->with('success', 'Product Data Successfully Deleted!');
    }

    public function getProduct($category_id){
        $products = Products::where('category_id', $category_id)->get();
        $response = ['status' => 'success', 'message' => 'Product Successfully Fetched!', 'data' => 'products'];
        return response()->json($response, 200);
    }
}
