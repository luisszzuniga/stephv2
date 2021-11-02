@extends('admin.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="">Administrateurs du site</h1>
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
                    <th scope="col">E-mail</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    @foreach($users as $user)
                        @if($user->id === $admin->user_id)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><strong>Administrateur</strong></td>
                                <td>

                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
