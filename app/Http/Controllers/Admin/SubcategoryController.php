<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {

        Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name
        ]);

        return redirect('/admin/subcategories');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();

        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $subcategory = Subcategory::findOrFail($id);

        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name
        ]);

        return redirect('/admin/subcategories');
    }

    public function destroy($id)
    {
        Subcategory::destroy($id);
        return back();
    }
}
