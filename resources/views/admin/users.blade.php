@extends('layouts.admin') 

@section('users_active') active @endsection 


@section('content')
    @include('plugins.admin-heading', ['title' => 'Users'])

    <div class="container">

        <table class="highlight">
            <thead>
                <tr>
                    <th data-field="id">#ID</th>
                    <th data-field="name">Name</th>
                    <th data-field="email">Email ID</th>
                    <th data-field="created_at">Joined At</th>
                    <th data-field="action" class="center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="center">
                        <a href="#" class="waves-effect waves-light btn yellow darken-2">Make Admin</a>
                        <a href="#" class="waves-effect waves-light btn red">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
