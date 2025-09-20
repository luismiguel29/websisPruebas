<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Control Websis</h1>
        <form action="controlHabilitar" method="GET">
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
            <button>GUARDAR</button>
        </form>

    </div>

</body>

</html>
