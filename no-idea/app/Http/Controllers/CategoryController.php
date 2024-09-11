<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index');
    }

    public function store(Request $request)
    {

        return $request;
        // $manager = new ImageManager(new Driver());

        // $request->validate([
        //     'title' => 'required|regex:/^[a-zA-Z\s]+$/u',
        //     'image' => 'required|image|mimes:jpeg,jpg,png,gif,bmp,webp,svg|max:2048|',
        // ]);

        // if ($request->hasFile('image')) {
        //     $new_name = auth()->user()->id."-".$request->title.'-'.rand(1111,9999).".".$request->file('image')->getClientOriginalExtension();
        //     $image = $manager->read($request->file('image'));
        //     $image->toPng()->save('public/uploades/category/'.$new_name);

        //     Category::inset([
        //         'title' => Str::ucfirst($request->title),
        //         'slug' => $request->slug,
        //         'image' => $new_name,
        //         'created_at' => now(),
        //     ]);

        //     return back()->with('category_success', 'Category Inset Successful');


        // } else {
        //     return back();
        // }
    }
}
