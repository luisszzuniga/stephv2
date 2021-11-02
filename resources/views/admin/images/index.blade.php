@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Images</h1>
        <a href="{{ route('stephane.admin.images.new') }}" class="btn btn-primary">Ajouter une image</a>
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Sous-catégorie</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                    <tr>
                        <td scope="row"><img class="admin-image" src="../../{{$image->url}}" alt="{{$image->name}}"></td>
                        <td>{{$image->name}}</td>
                        <td>{{$image->description}}</td>
                        <td>
                            @foreach($categories as $category)
                                @if($category->id === $image->category_id)
                                    {{$category->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($subCategories as $subCategory)
                                @if($subCategory->id === $image->sub_category_id)
                                    {{$subCategory->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{$image->price}} €</td>
                        <td>
                            <a href="{{ route('stephane.admin.images.edit', $image->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('stephane.admin.images.delete', $image->id) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
