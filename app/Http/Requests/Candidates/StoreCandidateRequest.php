<?php

namespace App\Http\Requests\Candidates;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['admin']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'election_id' => ['required'],
            'order_number' => ['required', 'numeric'],
            'president_name' => ['required', 'string'],
            'vice_president_name' => ['required', 'string'],
            'photo' => ['required', 'image', 'max:2048', 'mimes:png,jpg,jpeg'],
            'description' => ['required', 'string', 'min:10'],
            'visi' => ['required', 'string', 'min:10'],
            'misi' => ['required', 'string', 'min:10'],
        ];
    }
}
