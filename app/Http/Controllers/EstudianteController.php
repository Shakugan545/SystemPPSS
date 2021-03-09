<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Models\Expedientes;
use Alert;
use App\Http\Requests\EstudiantesAddRequest;
use App\Http\Requests\EstudiantesEditRequest;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $estudiantes = Estudiantes::all();
        return view('estudiantes.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudiantesAddRequest $request)
    {
        //guardar una foto con el nombre original en una carpeta de storage
        $estudiantes = $request->all();
            if($request->hasFile('foto')){
                $estudiantes['foto'] = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->storeAs('public/imagenes', $estudiantes['foto']);
            }
            Estudiantes::create($estudiantes);
        Alert::success('estudiante creado exitosamente');
        
        return redirect()->route('estudiantes.index',compact('estudiantes'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiantes = Estudiantes::findOrFail($id);
       
        return view('estudiantes.editar',compact('estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudiantesEditRequest $request, $id)
    {

        $estudiantes = Estudiantes::find($id);
       
        if($request->hasFile('foto')){
            $estudiantes['foto'] = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('public/imagenes', $estudiantes['foto']);
        }
         $estudiantes->update($request->all('nombre','codigo','telefono','correo','carrera'));// para poder editar la imagen se especifican todos los campos
        //al final del request all

        
        
        
        Alert::success('estudiante editado exitosamente');
        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiantes = Estudiantes::find($id);
       
        try{
             $estudiantes->delete();
             return redirect()->route('estudiantes.index')->with('eliminar','ok');
        }catch(\Exception $e){
             return $e;
        }
    }

    

    public function todo()
    {
        $estudiantes = Estudiantes::all();
        return view('estudiantes.ver',compact('estudiantes'));
    }
}
