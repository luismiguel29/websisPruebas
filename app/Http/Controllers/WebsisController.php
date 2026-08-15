<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class WebsisController extends Controller
{
    public function login()
    {
        $tiempoJS = $this->obtenerTiempoJS();
        $mensaje = "Bienvenido al Servicio a Estudiantes de la UMSS.";
        $sesion = session('sesion', false);

        if (!$sesion) {
            $aspCookieName = "ASPSESSIONIDCASBASBC";
            $aspCookieValue = "GCIBCECDCDAOBOIOHPMFLDLC";
            $srvNameValue = "S823";

            return response()
                ->view('login', compact('mensaje', 'tiempoJS'))
                ->cookie($aspCookieName, $aspCookieValue, 60)
                ->cookie("SRVNAME", $srvNameValue, 60);
        } else {
            return view('inicio', compact('tiempoJS'));
        }
    }
    public function activar()
    {
        session(['estado' => true]);
        return redirect()->back();
    }
    public function sesion(Request $request)
    {
        if ($request->input('idCodigo') === "CJR6877") {
            session(['sesion' => true]);
            return $this->inicio();
        } else {
            $mensaje = "El codigo de acceso es incorrecto";
            return view('login', compact('mensaje'));
        }
    }
    public function inicio()
    {
        /* $sesion = session('sesion', false);
        dd($sesion); */
        $tiempoJS = $this->obtenerTiempoJS();
        if (session('sesion', false)) {
            return view('inicio');
        } else {
            return $this->login();
        }
    }
    public function codigos()
    {
        $tiempoJS = $this->obtenerTiempoJS();
        if (!session('sesion', false)) {
            return $this->login();
        }
        $cod = session('cod', false);
        $estado = DB::table('control')
            ->where('id', '=', 1)
            ->first();
        if (!$cod) {
            return view('codigos', compact('estado', 'tiempoJS'));
        } else {
            $materias = DB::table('materias')->get();
            return view('materiasIns', compact('materias', 'tiempoJS'));
        }
    }

    public function materiasIns()
    {
        if (!session('cod', false)) {
            return $this->codigos();
        }
        $tiempoJS = $this->obtenerTiempoJS();
        $materias = DB::table('materias')->get();
        return view('materiasIns', compact('materias', 'tiempoJS'));
    }
    public function loginInscripcion()
    {
        session(['cod' => true]);
        $errorServe = DB::table('control')->where('id', '=', 25)->first();
        if ($errorServe->estado) {
            return view('errorpage');
        }
        return $this->materiasIns();
    }
    public function salirInscripcion()
    {
        session(['cod' => false]);
        return $this->inicio();
    }
    public function logout(Request $request)
    {
        $tiempoJS = $this->obtenerTiempoJS();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->login();
    }
    public function logoutServe(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return back();
    }
    private function obtenerTiempoJS()
    {
        return Cache::get('tiempoJS', 2000);
    }
    public function cambiarTiempo(Request $request)
    {
        Cache::forever('tiempoJS', (int) $request->input('tiempoJS'));

        return redirect()->back();
    }
    public function oferta()
    {
        if (!session('cod', false)) {
            return $this->codigos();
        }
        $materiasIns = DB::table('materias')->get();
        $materias = DB::table('listamateria')->get();
        $estado = session('estado', false);
        if (!$estado) {
            return view('oferta', compact('materias', 'materiasIns'));
        } else {
            return view('ofertaSup', compact('materias', 'materiasIns'));
        }
    }

    public function errorpage()
    {
        return view('errorpage');
    }

    public function materia(Request $request)
    {
        $tiempoJS = $this->obtenerTiempoJS();
        $grupos = DB::table('control')->get();
        $error = DB::table('control')->where('id', 23)->get()->first();
        $materia = DB::table('listamateria')
            ->where('id', $request->input('subj'))
            ->get()->first();
        $modo = $request->input('attend');
        if ($error->estado == 1) {
            return view('errorpage');
        } else {
            return view('materia', compact('materia', 'modo', 'grupos', 'tiempoJS'));
        }
    }

    public function materiaEdit(Request $request)
    {
        $tiempoJS = $this->obtenerTiempoJS();
        $modoCambiar = $request->input('modoCambiar');
        $grupos = DB::table('control')->get();
        $error = DB::table('control')->where('id', 23)->get()->first();
        $datosMateria = DB::table('listamateria')->where('nombre', $request->input('materia'))->first();
        /* $materia = $request->input('materia');
        $labo = $request->input('labo'); */
        //return view('materiaEdit', compact('materia', 'labo', 'grupos'));
        if ($error->estado == 1) {
            return view('errorpage');
        } else {
            return view('materiaEdit', compact('datosMateria', 'grupos', 'modoCambiar', 'tiempoJS'));
        }
    }

    public function registro(Request $request)
    {
        $materiasIns = DB::table('materias')->get();
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
        $negativo = DB::table('control')
            ->where('id', '=', 24)
            ->get()->first();
        if ($negativo->estado == 0) {
            DB::table('materias')->insert([
                'materia' => $request->input('materia'),
                'grupo' => $grupoFinal,
                'modo' => $request->input('modo'),
                'labo' => $labo,
                'edit' => 1
            ]);
        }
        return view('oferta', compact('materias', 'materiasIns'));
    }
    public function actualizar(Request $request)
    {
        $materiasIns = DB::table('materias')->get();
        $materias = DB::table('listamateria')->get();
        $grupoFinal = null;
        $labo = false;
        if ($request->input('modoCambiar') === 'GT') {
            $grupo = DB::table('materias')
                ->where('materia', $request->input('materia'))
                ->get()
                ->first();
            $cadena = $grupo->grupo;
            $cadena = substr_replace($cadena, $request->input('grupo'), 0, 1);
            $grupoFinal = $cadena;
        } else {
            $grupoP = $request->input('grupoPractica');
            if ($grupoP == null) {
                $grupoFinal = $request->input('grupo');
            } else {
                $grupoFinal = $request->input('grupo') . "/" . $request->input('grupoPractica');
                $labo = true;
            }
        }
        $negativo = DB::table('control')
            ->where('id', '=', 24)
            ->get()->first();
        if ($negativo->estado == 0) {
            DB::table('materias')
                ->where('materia', '=', $request->input('materia'))
                ->update([
                    'grupo' => $grupoFinal,
                    'modo' => $request->input('tipo')
                ]);
        }
        return view('oferta', compact('materias', 'materiasIns'));
    }
    function control()
    {
        $tiempoJS = $this->obtenerTiempoJS();
        $listamaterias = DB::table('listamateria')->get();
        $materiasIns = DB::table('materias')->get();
        $estado = DB::table('control')->where('id', '=', 1)->first();
        $error = DB::table('control')->where('id', '=', 23)->first();
        $negativo = DB::table('control')->where('id', '=', 24)->first();
        $serve = DB::table('control')->where('id', '=', 25)->first();
        $materias = DB::table('control')->get();
        return view('control', compact('estado', 'materias', 'listamaterias', 'error', 'negativo', 'materiasIns', 'serve', 'tiempoJS'));
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
    function actualizarMateriasEditar(Request $request)
    {
        $materias = $request->all();
        foreach ($materias as $id => $values) {
            DB::table('materias')
                ->where('id', $id)
                ->update([
                    'edit'     => $values['edit']
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
