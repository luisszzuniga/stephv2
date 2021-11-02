@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">Catégories</h1>
        <a href="{{ route('stephane.admin.categories.new') }}" class="btn btn-primary">Nouvelle Catégorie</a>
    </div>


    <div class="table-responsive">
        @if(Session()->has('error'))
            <div class="alert alert-warning">
                {{ Session()->get('error') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td scope="row">{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{ route('stephane.admin.categories.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('stephane.admin.categories.delete', $category->id) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
