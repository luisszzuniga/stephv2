<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\IndexImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
        $indexImagesId = IndexImage::all();
        $images = Image::all();
        $final = [];

        foreach($indexImagesId as $id)
        {
            foreach($images as $img)
            {
                if($id->image_id === $img->id)
                {
                    array_push($final, $img);
                    break;
                }
            }
        }

        $categories = Category::all();
        $final = array_reverse($final);

        return view('front.index', compact('final', 'categories'));
    }

    public function category(string $category)
    {
        $thisCategory = Category::where('name', $category)->first();
        $images = Image::where('category_id', $thisCategory->id)->orderByDesc('created_at')->get();
        $subCategories = SubCategory::where('category_id', $thisCategory->id)->get();

        $categories = Category::all();
        
        return view('front.category', compact('images', 'categories', 'thisCategory', 'subCategories'));
    }
}
