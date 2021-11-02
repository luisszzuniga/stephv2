@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">{{$h1}}</h1>
    </div>

    <div class="mt-4">
        <h3>{{$h3}}</h3>

        <div class="alert alert-warning mt-3">
            Attention! Si vous êtes entrain de supprimer une catégorie ou sous-catégorie, toutes les images leur appartenant seront également supprimées!
            Sinon, veuillez ignorer ce message.
        </div>

        <a href="{{$routeAnnuler}}" class="btn btn-primary mt-3">Annuler</a>
        <a href="{{$routeConfirm}}" class="btn btn-danger mt-3">Confirmer</a>
    </div>
@endsection