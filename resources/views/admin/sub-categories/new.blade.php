@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">Nouvelle Sous-catégorie</h1>
    </div>

    @if(Session()->has('error'))
        <div class="alert alert-warning">
            {{ Session()->get('error') }}
        </div>
    @endif

    <div class="w-50 mt-4">
        <form action="{{ route('stephane.admin.subcategories.store') }}" method="POST">
            @csrf
            <label for="name" class="form-label">Nom: </label>
            <input type="text" class="form-control" name='name' required>

            <label for="parent_category" class="form-label mt-2">Catégorie parente: </label>
            <select name="parent_category" class="form-select">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <label for="description" class="form-label mt-2">Description: </label>
            <textarea name="description" class="form-control" required></textarea>

            <button class="btn btn-primary mt-3">Créer</button>
        </form>
    </div>
@endsection