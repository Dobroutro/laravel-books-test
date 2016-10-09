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
            'name' => 'required|max:255|unique:authors,name,'.$this->segment(2).',id',
            'note' => 'max:500'
        ];
    }

}