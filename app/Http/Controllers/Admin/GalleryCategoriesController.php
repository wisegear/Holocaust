<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryCategories;
use App\Models\GalleryAlbums;
use Validator;
use File;

class GalleryCategoriesController extends Controller
{

    public $gallery_path = '/images/gallery';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = GalleryCategories::with('galleryalbums')->get();

        return view('admin.gallery.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'new_category_name' => 'required',
        ])->validate();  

        $category = new GalleryCategories;             

        $category->name = $request->new_category_name;

        File::MakeDirectory(public_path() . $this->gallery_path . '/' . strtolower($request->new_category_name));

        $category->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ])->validate(); 

        $category = GalleryCategories::find($id);

        File::Move(public_path() . $this->gallery_path . '/' . strtolower($category->name), public_path() . $this->gallery_path . '/' . strtolower($request->category_name));

        $category->name = $request->category_name;


        $category->save();


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $directory = GalleryCategories::find($id);

        GalleryCategories::destroy($id);

        File::DeleteDirectory(public_path() . $this->gallery_path . '/' . strtolower($directory->name));

        return back();
    }
}
