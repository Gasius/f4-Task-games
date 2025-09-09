<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $gameId = $this->route('game')->id;

        return [
            'title' => [
                'required',
                'string',
                'min:4',
                Rule::unique('games')->ignore($gameId),
            ],
            'description' => 'required|string',
            'genre' => 'required|string',
            'status' => ['required', Rule::in(['available', 'unavailable'])],
            'image' => 'nullable|string',
            'specification' => 'required|string',
        ];
    }
}
