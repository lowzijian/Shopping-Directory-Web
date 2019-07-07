<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $categories = Category::get();

        return view('categories.index', [
            'categories' => $categories,
            ]);
    }

    public function create()
    {
        $category = new Category();

        return view('categories.create', [
            'category' => $category,
            ]);
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->fill($request->all());
        $category->save();
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $category = Category::find($id);
        if(!$category) 
            throw new ModelNotFoundException;
        return view('categories.show', [
            'category' => $category
            ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category) 
            throw new ModelNotFoundException;
        return view('categories.edit', [
            'category' => $category
            ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if(!$category)
            throw new ModelNotFoundException;

        $category -> fill($request->all());

        $category -> save();

        return redirect() -> route('category.index');
    }
}
