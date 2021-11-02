@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajouter une image à la page d'accueil</h1>
    </div>

    <form action="{{ route('stephane.admin.index.store') }}" method="POST">
        @csrf
        @foreach($images as $image)
            <div class="mb-5">
                <input class="vertical-align" type="radio" name="image" value="{{$image->id}}">
                <label for="image">
                    <img class="admin-image image-vertical" src="../{{$image->url}}" alt="{{$image->name}}">
                </label>
            </div>
        @endforeach
        <button class="btn btn-primary mb-5">
            Ajouter
        </button>
    </form>
@endsection