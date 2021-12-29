<?php

namespace App\Http\Requests;

use App\Models\FileExtension;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'parameters' => 'required|string|max:191',
            'condition' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:3|string|max:65535',
            'files.*' => 'required|mimes:' . FileExtension::getAllExtensionsForMimeValidation(),
            'product_category_id' => 'exists:product_categories,id'
        ];
    }
}
