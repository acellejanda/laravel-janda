<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        'code' => 'required|string|size:12|unique:product,code',
        'name'=> 'required|string|max:100',
        'description'=> 'required|string',
       'manufacturer' => 'required|string|max:100',
       'photo'=> 'required|string|max:1000',
        'price' => 'required|numeric|min:0',
        'cost' => 'required|numeric|min:0',
        'inventory_quantity' => 'required|integer|min:0',
    ];
    }
}
