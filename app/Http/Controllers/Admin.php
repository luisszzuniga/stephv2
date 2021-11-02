<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\IndexImage;
use Illuminate\Http\Request;

class Admin extends Controller
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

        $final = array_reverse($final);
        return view('admin.index', compact('final'));
    }

    public function add()
    {
        $images = Image::all();
        return view('admin.add', compact('images'));
    }

    public function store()
    {
        $id = $_POST['image'];

        $image = new IndexImage();
        $image->image_id = $id;
        $image->save();

        return redirect(route('stephane.admin.index'));
    }

    public function remove(int $id)
    {
        $image = IndexImage::where('image_id', $id)->first();
        $image->delete();

        return redirect(route('stephane.admin.index'));
    }
}
