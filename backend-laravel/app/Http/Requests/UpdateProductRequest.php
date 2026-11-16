<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //
       return [
        'name' => 'sometimes|required|string|max:100',
        'description'=> 'sometimes|required|string',
        'manufacturer'=> 'sometimes|required|string|max:100',
        'photo'=> 'sometimes|required|string|max:1000',
        'price'=> 'sometimes|required|numeric|min:0',
        'cost'=> 'sometimes|required|numeric|min:0',
        'inventory_quantity'=> 'sometimes|required|integer|min:0',
    ];
    }
}
