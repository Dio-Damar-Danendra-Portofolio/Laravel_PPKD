<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "List of Categories";
        $categories = Categories::get();
        return view('categories.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add New Category";
        return view('categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categories::create([
            'category_name' => $request->category_name
        ]);
        return redirect()->to('categories')->with('success', 'Category Successfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Categories::findOrFail($id);
        $title = "Edit Category";
        return view('categories.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Categories::where('id', $id)->update([
            'category_name' => $request->category_name
        ]);

        return redirect()->to('categories')->with('success', 'Category Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();
        return redirect()->to('categories')->with('success', 'Category Successfully Deleted!');

    }
}
