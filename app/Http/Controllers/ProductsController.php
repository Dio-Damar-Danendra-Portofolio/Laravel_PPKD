<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class ProductsController extends Controller
{
    public function index(){
        $title = "List of Products";
        $products = Products::with('category')->get();
        return view('products.index', compact('title', 'products'));
    }

    public function create()
    {
        $title = "Add New Product";
        $categories = Categories::orderBy('id', 'desc')->get();
        return view('products.create', compact('title', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'is_active' => $request->is_active
        ];

        if ($request->hasFile('product_photo')) {
            $photo = $request->file('product_photo')->store('product', 'public');
            $data['product_photo'] = $photo;
        }
        Products::create($data);

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
        return view('products.edit', compact('edit', 'title', 'categories'));
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
}
