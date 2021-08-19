<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryCategories;
use App\Models\GalleryAlbums;
use File;

class GalleryAlbumsController extends Controller
{
    public $gallery_path = '/images/gallery';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album = new GalleryAlbums;
        $album->name = $request->album_name;
        $album->gallery_categories_id = $request->category_id;

        $categoryName = GalleryCategories::find($request->category_id);

        File::MakeDirectory(public_path() . $this->gallery_path . '/' . strToLower($categoryName->name) . '/' . strToLower($request->album_name));

        $album->save();

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $album = GalleryAlbums::find($id);
        $category = GalleryCategories::find($album->gallery_categories_id);
            // Move the file before changing the DB Record
            File::Move(public_path() . $this->gallery_path . '/' . strtolower($category->name . '/' . strToLower($album->name)),
                       public_path() . $this->gallery_path . '/' . strtolower($category->name . '/' . strToLower($request->album_name)));

        $album->name = $request->album_name;
        

        $album->save();

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
        $album = GalleryAlbums::find($id);
        $category = GalleryCategories::find($album->gallery_categories_id);

        // Delete the directory before removing DB record
        File::DeleteDirectory(public_path() . $this->gallery_path . '/' . strtolower($category->name . '/' . strtolower($album->name)));

        GalleryAlbums::destroy($id);

        return back();
    }
}
