@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">Modifier une sous-catégorie existante</h1>
    </div>

    @if(Session()->has('error'))
        <div class="alert alert-warning">
            {{ Session()->get('error') }}
        </div>
    @endif

    <div class="w-50 mt-4">
        <form action="{{ route('stephane.admin.subcategories.storeEdit') }}" method="POST">
            @csrf
            <label for="name" class="form-label">Nom: </label>
            <input type="text" class="form-control" name='name' value="{{ $subCategory->name }}" required>

            <label for="category" class="form-label mt-2">Catégorie parente: </label>
            <select name="category" class="form-select" disabled>
                @foreach($categories as $category)
                    @if($category->id === $subCategory->category_id)
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                @endforeach
            </select>

            <label for="description" class="form-label mt-2">Description: </label>
            <textarea name="description" class="form-control" required>{{ $subCategory->description }}</textarea>

            <button name="id" value="{{ $subCategory->id }}" class="btn btn-warning mt-3">Enregistrer les modifications  </button>
        </form>
    </div>
@endsection