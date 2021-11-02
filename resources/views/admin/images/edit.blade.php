@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modifier une photo existante</h1>
    </div>

    @if(Session()->has('error'))
        <div class="alert alert-warning">
            {{ Session()->get('error') }}
        </div>
    @endif

    <div class="w-50 mt-4">
        <form action="{{ route('stephane.admin.images.storeEdit') }}" method="POST">
            @csrf
            <label for="name" class="form-label">Nom: </label>
            <input type="text" class="form-control" name='name' required value="{{$image->name}}">

            <label for="description" class="form-label mt-2">Description: </label>
            <textarea name="description" class="form-control" required>{{$image->description}}</textarea>

            <label for="category_id" class="form-label mt-2">Catégorie: </label>
            <select name="category_id" id="categories" class="form-select">
                @foreach($categories as $category)
                    @if($category->id === $image->category_id)
                    {
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    }
                    @endif
                @endforeach
            </select>

            <label for="sub_category_id" class="form-label mt-2">Sous-catégorie: </label>
            <select name="sub_category_id" class="form-select" id="sous-categorie">
                @foreach($subCategories as $subCategory)
                    @if($subCategory->id === $image->sub_category_id)
                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                    @endif
                @endforeach
            </select>

            <label for="price" class="form-label mt-2">Prix: </label>
            <input name="price" type="number" class="form-control" min="0" value="{{$image->price}}" required>

            <label for="image" class="form-label mt-2">Photo: </label>
            <img class="admin-image d-block" src="../../../{{$image->url}}" alt="{{$image->name}}">
            <button name="id" value="{{$image->id}}" class="btn btn-primary mt-3">Valider les modifications</button>
        </form>
    </div>

@endsection