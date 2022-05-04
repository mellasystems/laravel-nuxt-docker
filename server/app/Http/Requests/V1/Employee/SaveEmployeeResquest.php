<?php

namespace App\Http\Requests\V1\Employee;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use function response;

class SaveEmployeeResquest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|regex:/^[\pL\s\-]+$/u',
            'status' => 'required|bool',
            'created_date' => 'required|date',
            'sex' => Rule::in('Femenino', 'Masculino'),
            'salary' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre no puede estar vacio',
            'name.min' => 'El nombre debe contener al menos 3 caracteres',
            'name.regex' => 'El nombre no puede contener numeros o caracteres especiales',
            'status.require' => 'El estado no puede estar vacio',
            'created_date.required' => 'Debe seleccionar una fecha',
            'created_date.date' => 'Debe ser una fecha valida',
            'status.bool' => 'El estado debe ser true o false',
            'sex.in' => 'El sexo debe ser masculino o femenino',
            'salary.require' => 'El salario no puede estar vacio',
            'salary.numeric' => 'El salario debe ser un caracter numérico'
        ];
    }
}
