<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('dashboard.category.index',compact('categories'));
    }

    public function store(Request $request){


       $manager = new ImageManager(new Driver());
        $request->validate([
            'title' => 'required|regex:/^[a-zA-Z\s]+$/u',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,bmp,webp,svg|max:2048|',
        ]);
        if($request->hasFile('image')){
            $new_name = auth()->user()->id .'-'. $request->title .'-'. rand(1111,9999) .'.'. $request->file('image')->getClientOriginalExtension();


            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/uploads/category/'.$new_name));

            if ($request->slug) {
                Category::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug( $request->slug, '-'),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
                return back()->with('category_success', 'Category Insert Successful');
            } else {
                Category::insert([
                    'title' => Str::ucfirst($request->title),
                    'slug' => Str::slug( $request->title, '-'),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
                return back()->with('category_success', 'Category Insert Successful');
            }

        } else {
            return back();
        }

    }

    public function edit($id){
       return view('');
    }

}




