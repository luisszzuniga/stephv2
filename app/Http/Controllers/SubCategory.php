<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory as ModelsSubCategory;
use Illuminate\Http\Request;

class SubCategory extends Controller
{
    public function index()
    {
        $subCategories = ModelsSubCategory::all();
        $categories = Category::all();
        return view('admin.sub-categories.index', compact('subCategories', 'categories'));
    }

    public function new()
    {
        $categories = Category::all();
        if(count($categories) < 1)
        {
            Session()->flash('error', 'Il faut d\'abord créer au moins 1 catégorie parente.');
            return redirect(route('stephane.admin.subcategories.index'));
        }
        return view('admin.sub-categories.new', compact('categories'));
    }

    public function store()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $parentCategoryId = $_POST['parent_category'];

        $subCategories = ModelsSubCategory::all();
        foreach($subCategories as $subCategory)
        {
            if($subCategory->name == $name && $subCategory->category_id == $parentCategoryId)
            {
                Session()->flash('error', "Cette catégorie parente comporte déjà une sous catégorie du nom: $name.");
                return redirect(route('stephane.admin.subcategories.new'));
            }
        }

        $parentCategory = Category::find($parentCategoryId);
        $parentCategoryName = $parentCategory->name;
        $path = "uploads/$parentCategoryName/$name";
        mkdir($path, 0777, true);

        $subCategory = new ModelsSubCategory();
        $subCategory->name = $name;
        $subCategory->description = $description;
        $subCategory->category_id = $parentCategoryId;
        $subCategory->save();

        return redirect(route('stephane.admin.subcategories.index'));
    }

    public function edit(int $id)
    {
        $subCategory = ModelsSubCategory::find($id);
        $categories = Category::all();

        return view('admin.sub-categories.edit', compact('subCategory', 'categories'));
    }

    public function storeEdit()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $categoryId = $_POST['category'];
        $id = $_POST['id'];

        $subCategories = ModelsSubCategory::all();
        foreach($subCategories as $subCategory)
        {
            if($subCategory->name == $name && $subCategory->category_id == $categoryId && $subCategory->id != $id)
            {
                Session()->flash('error', "Cette catégorie parente comporte déjà une sous catégorie du nom: $name.");
                return redirect(route('stephane.admin.subcategories.edit', $id));
            }
        }

        $category = Category::find($categoryId);
        if($name != $subCategory->name)
        {
            rename("uploads/$category->name/$subCategory->name", "uploads/$category->name/$name");
        }

        $subCategory = ModelsSubCategory::find($id);
        $subCategory->name = $name;
        $subCategory->description = $description;
        $subCategory->category_id = $categoryId;
        $subCategory->save();

        return redirect(route('stephane.admin.subcategories.index'));
    }

    public function delete(int $id)
    {
        $subCategory = ModelsSubCategory::find($id);

        $h1 = "Supprimer une sous-catégorie";
        $h3 = "Êtes-vous sûr de vouloir supprimer la sous-catégorie: $subCategory->name?";
        $routeAnnuler = route('stephane.admin.subcategories.index');
        $routeConfirm = route('stephane.admin.subcategories.unset', $subCategory->id);

        return view('admin.confirm', compact('h1', 'h3', 'routeAnnuler', 'routeConfirm'));
    }

    public function unset(int $id)
    {
        $subCategory = ModelsSubCategory::find($id);


        $parentCategory = Category::find($subCategory->category_id);
        $files = glob("uploads/$parentCategory->name/$subCategory->name/" . '*', GLOB_MARK);
        foreach($files as $file)
        {
            if(is_dir($file))
            {
                Session()->flash('error', 'Erreur surprenante');
                return redirect(route('stephane.admin.subcategories.index'));
            }
            else
            {
                unlink($file);
            }
        }
        rmdir("uploads/$parentCategory->name/$subCategory->name");

        $subCategory->delete();

        return redirect(route('stephane.admin.subcategories.index'));
    }
}
