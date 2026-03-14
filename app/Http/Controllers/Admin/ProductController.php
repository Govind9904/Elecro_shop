<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with(['category', 'subcategory'])->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {

        $imageName = null;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        Product::create([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName

        ]);

        return redirect('/admin/products');
    }

    public function edit($id)
    {

        $product = Product::findOrFail($id);

        $categories = Category::all();

        $subcategories = Subcategory::all();

        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);

            $product->image = $imageName;
        }

        $product->update([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price

        ]);

        return redirect('/admin/products');
    }

    public function destroy(Request $request, $id)
    {
        $deleted = Product::destroy($id);

        if ($request->ajax()) {
            if ($deleted) {
                return response()->json(['ok' => true]);
            }

            return response()->json(['ok' => false], 404);
        }

        return back();
    }
}
