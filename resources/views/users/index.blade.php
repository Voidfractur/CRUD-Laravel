<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
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
                                    - {{$error}} <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('users.store') }}" method="POST">
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                                </div>
                                <div class="col-4">
                                    <input type="email" name="email" class="form-control" placeholder="Correo" value="{{old('email')}}">
                                </div>
                                <div class="col-3">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Contraseña">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->id }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email }} </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        {{-- El metodo realmente es post poro cuando le ponemos method internamente es delete
                                        y csrf es el token que le dira a laravel que es nuestro formulario y no uno externo --}}
                                        <input type="submit" value="Eliminar" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Desa eliminar... ?')">
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
