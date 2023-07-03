<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:100', Rule::unique('apartments')->ignore($this->apartment)],
            'description' => 'required|string',
            'square_meters' => 'required|integer|numeric|min:0',
            'bed_number' => 'required|integer|numeric|min:0',
            'bathroom_number' => 'required|integer|numeric|min:0',
            'room_number' => 'required|integer|numeric|min:0',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|max:255',
            'visibility' => 'boolean',
        ];
    }
}
