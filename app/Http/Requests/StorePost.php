<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => 'required|min:4|max:25',
            'content' => 'bail|required|max:100', /* bail c'est pour dire à laravel si la première condition n'est pas vérifiée
                                                     c'est pas la perine que vous examinez les conditions qui restent */
        ];
    }
}
