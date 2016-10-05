<?php 
namespace App\Http\Requests;

class AuthorEditRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'note' => 'max:500'
        ];
    }

}