<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudiantesAddRequest extends FormRequest
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
            'codigo'       =>       'required|numeric|digits_between:0,10',
            'nombre'       =>       'required|regex:/^[\pL\s\-]+$/u|max:55',
            'telefono'     =>       'required|numeric|digits_between:0,10',
            'correo'       =>       'required|email|max:38',
            'carrera'      =>       'required|regex:/^[\pL\s\-]+$/u|max:60',
            'foto'         =>       'mimes:png,jpg',
            
           
        ];
    }
    public function messages()  
    {
        return[
            'codigo.required'           => 'El código es Obligatorio',
            'codigo.numeric'            => 'El código debe ser numérico',
            'codigo.digits_between'     => 'El código no puede ser mayor a 10 digitos',

            'nombre.required'            => 'El Nombre es Obligatorio',
            'nombre.regex'               => 'El Nombre no permite números',
            'nombre.max'                 => 'El Nombre no debe de exceder los 55 caracteres',
            'telefono.required'          => 'El Telefono es Obligatorio',
            'telefono.numeric'           => 'El Telefono es debe ser numérico',
            'telefono.digits_between'    => 'El Telefono no debe de exceder los 10 digitos',

            'correo.required'            => 'El Correo es Obligatorio',
            'correo.email'               => 'El Correo no cuenta con el (@ .) formato de correo',
            'correo.max'                 => 'El Correo no debe exceder los 38 caracteres',
            'carrera.required'           => 'La Carrera es Obligatorio',
            'carrera.regex'              => 'La Carrera no permite números',
            'carrera.max'                => 'La Carrera no debe de exceder los 60 caracteres',
            
            'foto.mimes'                 => 'La foto solo acepta extensiones .png y .jpg'
            
        ];
    }
}
