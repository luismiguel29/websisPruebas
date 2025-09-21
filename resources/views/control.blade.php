<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('cssGeneral/bootstrap.min.css') }}">
</head>

<body>
    <div class="container-fluid">
        <h1>Control Websis</h1>
        <div class="container-fluid">
            <div class="row">
                <form action="controlHabilitar" method="GET">
                    <div class="col">
                        <div>
                            <input type="hidden" name="{{ $estado->id }}" value="0">
                            <input type="checkbox" name="{{ $estado->id }}" value="1"
                                @if ($estado->estado) checked @endif>
                            <label for="">Estado websis</label>
                        </div>
                        <h2>Materias:</h2>
                        @foreach ($materias as $mat)
                            @if ($mat->normal)
                                <div>
                                    <input type="hidden" name="{{ $mat->id }}" value="0">
                                    <input type="checkbox" name="{{ $mat->id }}" value="1"
                                        @if ($mat->estado) checked @endif>
                                    <label for="">{{ $mat->nombre }}</label>
                                </div>
                            @endif
                        @endforeach
                        <h2>Practica:</h2>
                        @foreach ($materias as $mat)
                            @if (!$mat->normal && $mat->id != 1)
                                <div>
                                    <input type="hidden" name="{{ $mat->id }}" value="0">
                                    <input type="checkbox" name="{{ $mat->id }}" value="1"
                                        @if ($mat->estado) checked @endif>
                                    <label for="">{{ $mat->nombre }}</label>
                                </div>
                            @endif
                        @endforeach
                        <button class="btn btn-primary">GUARDAR</button>
                    </div>
                </form>
                <div class="col">
                    <form action="actualizarMaterias" method="GET">
                        <div class="row">
                            <div class="col">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mesa</th>
                                            <th scope="col">Practica</th>
                                            <th scope="col">Nivel</th>
                                            <th scope="col">Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listamaterias as $list)
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="{{ $list->id }}[mesa]"
                                                        value="0">
                                                    <input type="checkbox" name="{{ $list->id }}[mesa]"
                                                        value="1" @if ($list->mesa) checked @endif>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="{{ $list->id }}[practica]"
                                                        value="0">
                                                    <input type="checkbox" name="{{ $list->id }}[practica]"
                                                        value="1" @if ($list->practica) checked @endif>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="{{ $list->id }}[nivel]"
                                                        value="0">
                                                    <input type="checkbox" name="{{ $list->id }}[nivel]"
                                                        value="1" @if ($list->nivel) checked @endif>
                                                </td>
                                                <td>{{ $list->nombre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary">GUARDAR</button>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="col">
                    <form action="borrarMaterias" method="GET">
                        <button class="btn btn-primary">BORRAR</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</body>

</html>
