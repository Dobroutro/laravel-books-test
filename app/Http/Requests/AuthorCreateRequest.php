<?php 
namespace App\Http\Requests;

class AuthorCreateRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:authors',
            'note' => 'max:500'
        ];
    }

}