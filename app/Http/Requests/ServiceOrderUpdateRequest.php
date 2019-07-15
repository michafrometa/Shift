<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceOrderUpdateRequest extends FormRequest
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
            'agreement_id' => 'required|exists:shift_agreements,id',
            'post_collection_id' => 'required|exists:shift_post_collections,id',
            'patient_id' => 'required|exists:shift_patients,id',
            'doctor_id' => 'required|exists:shift_doctors,id',
        ];
    }
}
