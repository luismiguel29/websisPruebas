<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class WebsisController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function inicio()
    {
        return view('inicio');
    }

    public function codigos()
    {
        $estado = DB::table('control')
            ->where('id', '=', 1)
            ->first();
        return view('codigos', compact('estado'));
    }

    public function materiasIns()
    {
        $materias = DB::table('materias')->get();
        return view('materiasIns', compact('materias'));
    }

    public function oferta()
    {
        $materias = DB::table('listamateria')->get();
        $estado = session('estado', false);
        if (!$estado) {
            return view('oferta', compact('materias'));
        } else {
            return view('ofertaSup', compact('materias'));
        }
    }

    public function errorpage()
    {
        return view('errorpage');
    }

    public function materia(Request $request)
    {
        $grupos = DB::table('control')->get();
        $error = DB::table('control')->where('id', 23)->get()->first();
        $materia = DB::table('listamateria')
            ->where('id', $request->input('materia'))
            ->get()->first();
        $modo = $request->input('modo');
        if ($error->estado == 1) {
            return view('errorpage');
        } else {
            return view('materia', compact('materia', 'modo', 'grupos'));
        }
    }

    public function materiaEdit(Request $request)
    {
        $grupos = DB::table('control')->get();
        $materia = $request->input('materia');
        $labo = $request->input('labo');
        return view('materiaEdit', compact('materia', 'labo', 'grupos'));
    }

    public function activar()
    {
        session(['estado' => true]);
        return redirect()->back();
    }
    public function registro(Request $request)
    {
        $materias = DB::table('listamateria')->get();
        $grupoFinal = null;
        $labo = false;
        $grupoP = $request->input('grupoPractica');
        if ($grupoP == null) {
            $grupoFinal = $request->input('grupo');
        } else {
            $grupoFinal = $request->input('grupo') . "/" . $request->input('grupoPractica');
            $labo = true;
        }
        DB::table('materias')->insert([
            'materia' => $request->input('materia'),
            'grupo' => $grupoFinal,
            'modo' => $request->input('modo'),
            'labo' => $labo
        ]);
        return view('oferta', compact('materias'));
    }
    public function actualizar(Request $request)
    {
        $materias = DB::table('listamateria')->get();
        $grupoFinal = null;
        $labo = false;
        $grupoP = $request->input('grupoPractica');
        if ($grupoP == null) {
            $grupoFinal = $request->input('grupo');
        } else {
            $grupoFinal = $request->input('grupo') . "/" . $request->input('grupoPractica');
            $labo = true;
        }
        DB::table('materias')
            ->where('materia', '=', $request->input('materia'))
            ->update([
                'grupo' => $grupoFinal,
                'modo' => $request->input('tipo')
            ]);
        return view('oferta', compact('materias'));
    }
    function control()
    {
        $listamaterias = DB::table('listamateria')->get();
        $estado = DB::table('control')->where('id', '=', 1)->first();
        $error = DB::table('control')->where('id', '=', 23)->first();
        $materias = DB::table('control')->get();
        return view('control', compact('estado', 'materias', 'listamaterias', 'error'));
    }
    function controlHabilitar(Request $request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            DB::table('control')
                ->where('id', $key)
                ->update([
                    'estado' => $value
                ]);
        }
        return back()->with('success', 'Materias actualizadas correctamente.');
    }
    function borrarMateria(Request $request)
    {
        $data = array_keys($request->all());
        $ids = array_filter($data, fn($id) => is_numeric($id));
        if (!empty($ids)) {
            DB::table('materias')
                ->whereIn('id', $ids)
                ->delete();
        }
        return back();
    }
    function actualizarMaterias(Request $request)
    {
        $materias = $request->all();
        foreach ($materias as $id => $values) {
            DB::table('listamateria')
                ->where('id', $id)
                ->update([
                    'mesa'     => $values['mesa'],
                    'practica' => $values['practica'],
                    'nivel'    => $values['nivel'],
                ]);
        }
        return back();
    }
    function borrarMaterias()
    {
        DB::table('materias')->delete();
        return back();
    }
}
