<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">

                    <div class="card border-0 shadow">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                            @endif

                            <form action="{{ route('user.store') }}" method="post">
                                <div class="row">
                                    <div class="col-sm-3">
                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="Nombre"
                                        class="form-control"
                                        value="{{ old('name') }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <input
                                            type="email"
                                            name="email"
                                            placeholder="email"
                                            class="form-control"
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input
                                            type="password"
                                            name="password"
                                            placeholder="Contrasegna"
                                            class="form-control">
                                    </div>
                                    <div class="col-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>email</th>
                                <th>email</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td scope="row">{{ $user->id }}</td>
                                    <td scope="row">{{ $user->name }}</td>
                                    <td scope="row">{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <input
                                                type="submit"
                                                value="Eliminar"
                                                class="btn btn-danger"
                                                onclick="return confirm('En realidad desea eliminar este usuario?')">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
