<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class Images extends Controller
{
    public function index()
    {
        $images = Image::all()->sortByDesc('created_at');
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.images.index', compact('images', 'categories', 'subCategories'));
    }

    public function new()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.images.new', compact('categories', 'subCategories'));
    }

    public function store()
    {
        $image = $_FILES['image'];

        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageError = $_FILES['image']['error'];
        $imageType = $_FILES['image']['type'];

        $imageExt = explode('.', $imageName);
        $imageActualExt = strtolower(end($imageExt));

        $allowed = array('jpg', 'jpeg', 'png');

        $name = $_POST['name'];
        $description = $_POST['description'];
        $categoryId = $_POST['category_id'];
        $subCategoryId = $_POST['sub_category_id'];
        $price = $_POST['price'];

        $category = Category::find($categoryId);
        $categoryName = $category->name;


        if (in_array($imageActualExt, $allowed))
        {
            if ($imageError === 0)
            {
                if ($imageSize < 10000000)
                {
                    $imageNewName = uniqid('', true) . "." . $imageActualExt;
                    
                    if($subCategoryId != 0)
                    {
                        $subCategory = SubCategory::find($subCategoryId);
                        $subCategoryName = $subCategory->name;
                        $imageDestination = 'uploads/' . $categoryName . "/" . $subCategoryName . '/' . $imageNewName;
                    }
                    else
                    {
                        $imageDestination = 'uploads/' . $categoryName . "/" . $imageNewName;
                    }

                    move_uploaded_file($imageTmpName, $imageDestination);

                    $image = new Image();
                    $image->name = $name;
                    $image->description = $description;
                    $image->category_id = $categoryId;
                    $image->sub_category_id = $subCategoryId;
                    $image->price = $price;
                    $image->url = $imageDestination;
                    $image->save();

                    
                    return redirect(route('stephane.admin.images.index'));
                }else 
                {
                    Session()->flash('error', 'Image trop lourde');
                    return redirect(route('stephane.admin.images.new'));
                }
            }else
            {
                Session()->flash('error', 'L\'image comporte une erreur, veuillez réessayer ou changer d\'image');
                return redirect(route('stephane.admin.images.new'));
            }
        }else
        {
            Session()->flash('error', 'Vous n\'êtes pas autorisé à mettre en ligne ce genre de fichiers');
            return redirect(route('stephane.admin.images.new'));
        }
    }

    public function edit(int $id)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $image = Image::find($id);

        return view('admin.images.edit', compact('categories', 'subCategories', 'image'));
    }

    public function storeEdit()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $id = $_POST['id'];

        if($price < 1)
        {
            Session()->flash('error', 'Vous ne pouvez pas mettre un prix négratif! Comment allez-vous faire du bénéfice?!');
            return redirect(route('stephane.admin.images.edit', $id));
        }

        $image = Image::find($id);
        $image->name = $name;
        $image->description = $description;
        $image->price = $price;
        $image->save();

        return redirect(route('stephane.admin.images.index'));
    }

    public function delete(int $id)
    {
        $image = Image::find($id);

        $h1 = 'Suppression d\'image';
        $h3 = "Êtes-vous sûr de vouloir supprimer l'image: $image->name ?";
        $routeAnnuler = route('stephane.admin.images.index');
        $routeConfirm = route('stephane.admin.images.unset', $image->id);

        return view('admin.confirm', compact('h1', 'h3', 'routeAnnuler', 'routeConfirm'));
    }   

    public function unset(int $id)
    {
        $image = Image::find($id);

        unlink($image->url);
        
        $image->delete();

        return redirect(route('stephane.admin.images.index'));
    }
}
