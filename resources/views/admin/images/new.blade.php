@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajouter une nouvelle photo</h1>
    </div>

    @if(Session()->has('error'))
        <div class="alert alert-warning">
            {{ Session()->get('error') }}
        </div>
    @endif

    <div class="w-50 mt-4">
        <form action="{{ route('stephane.admin.images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name" class="form-label">Nom: </label>
            <input type="text" class="form-control" name='name' required>

            <label for="description" class="form-label mt-2">Description: </label>
            <textarea name="description" class="form-control" required></textarea>

            <label for="category_id" class="form-label mt-2">Catégorie: </label>
            <select name="category_id" id="categories" class="form-select" onclick="addPicture()">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <label for="sub_category_id" class="form-label mt-2">Sous-catégorie: </label>
            <select name="sub_category_id" class="form-select" id="sous-categorie" disabled>
                <option value="0" selected data-id="0">Aucune</option>
                @foreach($subCategories as $subCategory)
                    <option value="{{$subCategory->id}}" data-id="{{$subCategory->category_id}}">{{$subCategory->name}}</option>
                @endforeach
            </select>

            <label for="price" class="form-label mt-2">Prix: </label>
            <input name="price" type="number" class="form-control" min="0">

            <label for="image" class="form-label mt-2">Photo: </label>
            <input class="form-control" type="file" name="image">

            <button class="btn btn-primary mt-3">Ajouter</button>
        </form>
    </div>


    <script>
    function addPicture()
    {
        var select = document.getElementById('sous-categorie');
        select.disabled = false;

        var categories = document.getElementById('categories');

        var categorieId = categories.value;


        for(var i = 0; i < select.options.length; i++)
        {
            if(select.options[i].dataset.id == categorieId || select.options[i].dataset.id == 0)
            {   
                select.options[i].hidden = false;
            }
            else
            {
                select.options[i].hidden = true;
            }
        }
    }
    </script>
@endsection