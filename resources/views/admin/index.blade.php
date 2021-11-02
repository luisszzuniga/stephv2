@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Page d'accueil</h1>
        <a href="{{ route('stephane.admin.index.add') }}" class="btn btn-primary">Ajouter une image pour la page d'accueil</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($final as $image)
                    <tr>
                        <td scope="row">
                            <img class="admin-image" src="../../{{$image->url}}" alt="{{$image->name}}">
                        </td>
                        <td>
                            {{$image->name}}
                        </td>
                        <td>
                            <a href="{{ route('stephane.admin.index.remove', $image->id) }}" class="btn btn-warning">Enlever de la page d'accueil</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection