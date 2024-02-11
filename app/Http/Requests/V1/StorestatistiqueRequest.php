<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorestatistiqueRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'typeStatistique' => 'required|integer',
            'entrepriseId' => 'required|integer',
            'dateStatistique' => 'required|string',
            'valeurStatistique' => 'required|integer',
        ];   
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'Type_statistique' => $this->typeStatistique,
            'entreprise_id' => $this->entrepriseId,
            'Date_statistique' => $this->dateStatistique,
            'Valeur_statistique' => $this->valeurStatistique,
        ]);
    }

}
