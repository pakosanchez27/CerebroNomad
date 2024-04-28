<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class VistaGuardiansController extends Controller
{
    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'apellido_paterno' => 'required',
            'parentesco' => 'required',
            'edad' => 'required', 
            'telefono' => 'required',
            'email' => 'required|email',
        ]);

        Guardian::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'parentesco' => $request->parentesco,
            'edad' => $request->edad,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'patient_id' => $request->patient_id,
        ]);



        return redirect()->back()->with('agregado', 'Responsable creado correctamente');
    }



    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'apellido_paterno' => 'required',
            'parentesco' => 'required',
            'edad' => 'required|min:18', 
            'telefono' => 'required',
            'email' => 'required|email',
        ]);

        $guardian = Guardian::find($id);
        $guardian->name = $request->name;
        $guardian->apellido_paterno = $request->apellido_paterno;
        $guardian->apellido_materno = $request->apellido_materno;
        $guardian->parentesco = $request->parentesco;
        $guardian->edad = $request->edad;
        $guardian->telefono = $request->telefono;
        $guardian->email = $request->email;
        $guardian->save();
        return redirect()->back()->with('actualizado', 'Responsable actualizado correctamente');
    }

    function destroy($id)
    {
        $guardian = Guardian::find($id);
        $guardian->delete();
        return redirect()->back()->with('eliminado', 'Responsable eliminado correctamente');
    }
}
