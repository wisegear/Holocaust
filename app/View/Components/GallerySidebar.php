<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\GalleryCategories;
use App\Models\GalleryAlbums;
use App\Models\GalleryImages;
use App\Models\GalleryComments;
use App\Models\GalleryTags;
use App\Models\GalleryTagsPivot;

class GallerySidebar extends Component
{
    public $gallery_path = '/images/gallery/';
    public $popular_tags;
    public $image_count;
    public $gallery_categories;
    public $recent_images;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
		//  Bring in the elements we need from elsewhere
		
		$this->popular_tags = GalleryTagsPivot::getPopularTags(); 

		//  Get additional elements from this method. 
		$this->image_count = GalleryImages::all()->count();
		$this->gallery_categories = GalleryCategories::paginate(12);
		$this->recent_images = GalleryImages::where('published', true)->orderBy('id', 'desc')->limit(9)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.gallery-sidebar');
    }
}
