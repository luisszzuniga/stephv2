<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function index()
    {
        $categories = ModelsCategory::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function new()
    {
        return view('admin.categories.new');
    }

    public function store()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $checkName = ModelsCategory::where('name', $name)->get();
        if(count($checkName) > 0)
        {
            Session()->flash('error', 'La catégorie: ' . $name . ' existe déjà.');
            return redirect('admin/categories/new');
        }

        $path = "uploads/$name";
        mkdir($path, 0777, true);

        $category = new ModelsCategory;
        $category->name = $name;
        $category->description = $description;
        $category->save();



        return redirect('admin/categories');
    }

    public function edit(int $id)
    {
        $category = ModelsCategory::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function storeEdit()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $category = ModelsCategory::find($id);

        $checkName = ModelsCategory::where('name', $name)->get();
        if($name != $category->name && count($checkName) > 0)
        {
            Session()->flash('error', 'La catégorie: ' . $name . ' existe déjà.');
            return redirect('admin/categories/edit/' . $id);
        }

        if($name != $category->name)
        {
            rename("uploads/$category->name", "uploads/$name");
        }

        
        $category->name = $name;
        $category->description = $description;
        $category->save();

        return redirect('admin/categories');
    }

    public function delete(int $id)
    {
        $category = ModelsCategory::find($id);
        
        $h1 = "Supprimer une catégorie";
        $h3 = "Êtes-vous sûr de vouloir supprimer la catégorie $category->name ?";
        $routeAnnuler = route('stephane.admin.categories.index');
        $routeConfirm = route('stephane.admin.categories.unset', $category->id);

        return view('admin.confirm', compact('h1', 'h3', 'routeAnnuler', 'routeConfirm'));
    }

    public function unset(int $id)
    {
        $category = ModelsCategory::find($id);
        
        $files = glob("uploads/$category->name/" . '*', GLOB_MARK);
        foreach($files as $file)
        {
            if(is_dir($file))
            {
                Session()->flash('error', 'Vous devez d\'abord supprimer les sous-catégories appartenant à cette catégorie parente.');
                return redirect(route('stephane.admin.categories.index'));
            }
            else
            {
                unlink($file);
            }
        }
        rmdir("uploads/$category->name");

        $category->delete();


        return redirect(route('stephane.admin.categories.index'));
    }
}
