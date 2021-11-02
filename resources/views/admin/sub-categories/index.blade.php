@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">Sous-Catégories</h1>
        <a href="{{ route('stephane.admin.subcategories.new') }}" class="btn btn-primary">Nouvelle Sous-Catégorie</a>
    </div>

    @if(Session()->has('error'))
        <div class="alert alert-warning">
            {{ Session()->get('error') }}
        </div>
    @endif


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catégorie Parente</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subCategories as $subCategory)
                    <tr>
                        <td scope="row">{{$subCategory->id}}</td>
                        <td>{{$subCategory->name}}</td>
                        <td>{{$subCategory->description}}</td>
                        <td>
                            @foreach($categories as $category)
                                @if($category->id === $subCategory->category_id)
                                    {{$category->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('stephane.admin.subcategories.edit', $subCategory->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('stephane.admin.subcategories.delete', $subCategory->id) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
