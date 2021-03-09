<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedientesEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'programa'              =>       'required|regex:/^[\pL\s\-]+$/u|max:100',
            'inicio'                =>       'required|',
            'fin'                   =>       'required|',
            'dia'                   =>       'required|regex:/^[\pL\s\-]+$/u|max:40',
            'h_inicio'              =>       'required|',
            'h_fin'                 =>       'required|',
            'reportes'              =>       'required|mimes:pdf',
            'estudiantes_codigo'    =>       'required|exists:estudiantes,codigo|numeric',
           
           
        ];
    }
    public function messages()  
    {
        return[
            'estudiantes_codigo.required'           => 'El código es Obligatorio',
            'estudiantes_codigo.exists'             => 'El código no se encuentra registrado en la base de datos',
            'estudiantes_codigo.numeric'            => 'El código debe ser numérico',

            'inicio.required'                       => 'El Inicio es Obligatorio',
            'fin.required'                          => 'El Fin es Obligatorio',

            'programa.required'                     => 'El Programa es Obligatorio',
            'programa.regex'                        => 'El programa no permite números',
            'programa.max'                          => 'El programa no debe de exceder los 100 caracteres',
            'dia.required'                          => 'El Dia es Obligatorio',
            'dia.regex'                             => 'El Dia no acepta números',
            'dia.max'                               => 'El Dia no debe de exceder los 40 caracteres',

            'h_inicio.required'                     => 'La hora de Inicio es Obligatorio',
            'h_fin.required'                        => 'La hora de Fin es Obligatorio',
            
            
            'reportes.required'                     => 'El Reporte es Obligatorio',
            'reportes.mimes'                        => 'El Reporte tiene que ser formato PDF',
            
        ];
    }
}
