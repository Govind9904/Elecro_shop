<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Setting;

class FrontendController extends Controller
{

    public function home()
    {
        $sliders = Slider::where('status', 1)->get();
        $categories = Category::all();
        $products = Product::latest()->take(8)->get();
        $contact = Setting::first();
        return view('frontend.home', compact('sliders', 'categories', 'products', 'contact'));
    }


    public function products($name = null)
    {
        $categories = Category::all();

        if ($name) {
            $category = Category::where('name', $name)->firstOrFail();
            $products = Product::where('category_id', $category->id)->paginate(9);
        } else {

            $products = Product::paginate(12);
            $category = null;
        }

        return view('frontend.products', compact('products', 'categories', 'category'));
    }


    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::where('category_id', $category->id)->paginate(12);

        return view('frontend.products', compact('products', 'category'));
    }


    public function subcategoryProducts($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();

        $products = Product::where('subcategory_id', $subcategory->id)->paginate(12);

        return view('frontend.products', compact('products', 'subcategory'));
    }


    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('frontend.product_detail', compact('product'));
    }


    public function checkout()
    {
        return view('frontend.checkout');
    }


    public function contact()
    {
        $setting = Setting::first();

        return view('frontend.contact', compact('setting'));
    }
}
