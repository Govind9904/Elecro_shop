<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'image|max:2048'
        ]);

        $imageName = null;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        Category::create([
            'name' => $request->name,
            'image' => $imageName
        ]);

        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);

            $category->image = $imageName;
        }

        $category->name = $request->name;

        $category->save();

        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return back();
    }
}
