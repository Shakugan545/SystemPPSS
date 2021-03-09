<?php

namespace App\Http\Controllers;
use App\Models\Expedientes;
use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\ExpedientesAddRequest;
use App\Http\Requests\ExpedientesEditRequest;
use Barryvdh\DomPDF\PDF;

class ExpedientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $expedientes = Expedientes::all();
        return view('expedientes.index',compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expedientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpedientesAddRequest $request)
    {
        //$expedientes = Expedientes::create($request->all());
       // return redirect()->route('expedientes.index',compact('expedientes'));

       $expedientes = $request->all();
       if($request->hasFile('reportes')){
           $expedientes['reportes'] = $request->file('reportes')->getClientOriginalName();
           $request->file('reportes')->storeAs('public/reportes', $expedientes['reportes']);
       }
        Expedientes::create($expedientes);
        Alert::success('Expediente creado exitosamente');

         return redirect()->route('expedientes.index',compact('expedientes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expedientes = Expedientes::findOrFail($id);

        return view('expedientes.editar', compact('expedientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpedientesEditRequest $request, $id)
    {
        $expedientes = Expedientes::find($id);
       
        if($request->hasFile('reportes')){
            $expedientes['reportes'] = $request->file('reportes')->getClientOriginalName();
            $request->file('reportes')->storeAs('public/reportes', $expedientes['reportes']);
        }
         $expedientes->update($request->all('programa','inicio','fin','dia','h_inicio','h_fin','estudiantes_codigo'));// para poder editar la imagen se especifican todos los campos
        //al final del request all

        Alert::success('Expediente editado exitosamente');
        return redirect()->route('expedientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expedientes = Expedientes::find($id);
       
        try{
             $expedientes->delete();
             return redirect()->route('expedientes.index')->with('eliminar','ok');
        }catch(\Exception $e){
             return $e;
        }
    
    }

    public function download($id)
    {
        $expedientes = Expedientes::where('id',$id)->firstOrFail();
        $pathToFile = storage_path('app/public/reportes/' . $expedientes->reportes);
        return response()->download($pathToFile);
    
    }

 
}
