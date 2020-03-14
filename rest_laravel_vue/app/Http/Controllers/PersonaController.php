<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Persona::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|max:50',
            'Edad' => 'required',
            'Password' => 'required|min:6',
            'Email' => 'required|email|unique:Personas',
            'Telefono' => 'required|max:10',
            'Estado_id' => 'required'
        ]);

        //
        $personaData = new Persona;
        $personaData->Nombre = $request->input('Nombre');
        $personaData->Edad = $request->input('Edad');
        $personaData->Password = Hash::make($request->input('Password'));
        $personaData->Email = $request->input('Email');
        $personaData->Telefono = $request->input('Telefono');
        $personaData->Estado_id = $request->input('Estado_id');
        $personaData->save();

        return "Persona guardada";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $personaData = Persona::findOrFail($id);
        return $personaData;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        
        $request->validate([
            'Nombre' => 'required|max:50',
            'Edad' => 'required',
            'Email' => 'required|email|unique:Personas,Email,' . $id,
            'Telefono' => 'required|max:10',
            'Estado_id' => 'required'
        ]);
        if(!empty($request->input('Password'))){
            $request->validate([
                'Password' => 'required|min:6',
            ]);
        }

        $personaData = Persona::findOrFail($id);

        $personaData->Nombre = $request->input('Nombre');
        $personaData->Edad = $request->input('Edad');
        if(!empty($request->input('Password'))){
            $personaData->Password = Hash::make($request->input('Password'));
        }
        $personaData->Email = $request->input('Email');
        $personaData->Telefono = $request->input('Telefono');
        $personaData->Estado_id = $request->input('Estado_id');
        $personaData->save();

        return "Persona actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $personaData = Persona::findOrFail($id);
        $personaData->delete();
        return "Persona eliminada";
    }
}
