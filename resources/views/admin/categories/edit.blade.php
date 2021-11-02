@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">Modifier une catégorie existante</h1>
    </div>

    @if(Session()->has('error'))
        <div class="alert alert-warning">
            {{ Session()->get('error') }}
        </div>
    @endif

    <div class="w-50 mt-4">
        <form action="{{ route('stephane.admin.categories.storeEdit') }}" method="POST">
            @csrf
            <label for="name" class="form-label">Nom: </label>
            <input type="text" class="form-control" name='name' value="{{ $category->name }}" required>

            <label for="description" class="form-label">Description: </label>
            <textarea name="description" class="form-control" required>{{ $category->description }}</textarea>

            <button name="id" value="{{ $category->id }}" class="btn btn-warning mt-3">Enregistrer les modifications  </button>
        </form>
    </div>
@endsection