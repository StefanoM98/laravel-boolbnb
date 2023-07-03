<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreApartmentRequest extends FormRequest
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
            'name' => ['required','string','max:100', Rule::unique('apartments')],
            'description' => 'required|string',
            'square_meters' => 'required|integer',
            'bed_number' => 'required|integer',
            'bathroom_number' => 'required|integer',
            'room_number' => 'required|integer',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'latitude' => 'required|string|max:100',
            'longitude' => 'required|string|max:100',
            'price' => 'required|numeric',
            'image' => 'nullable|string|max:255',
            'visibility' => 'boolean',
        ];
    }

}
