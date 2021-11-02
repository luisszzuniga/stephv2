@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Commentaires</h1>
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Sous-catégorie</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td scope="row"><img class="admin-image" src="../../{{$comment->url}}" alt="{{$comment->name}}"></td>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->description}}</td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>{{$comment->price}} €</td>
                        <td>
                            <a href="{{ route('stephane.admin.images.edit', $comment->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('stephane.admin.images.delete', $comment->id) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
