<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_link' => $request->button_link,
            'image' => $imageName,
            'status' => $request->status
        ]);

        return redirect('/admin/sliders');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);

            $slider->image = $imageName;
        }

        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;

        $slider->save();

        return redirect('/admin/sliders');
    }

    public function destroy($id)
    {
        Slider::destroy($id);
        return back();
    }
}
