<?php 
namespace App\Http\Requests;

class BookEditRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:books,title,'.$this->segment(2).',id',
            'purchase_year' => 'required|int|min:1800|max:'.date("Y").'',            
            'note' => 'max:500',
            'image' => 'image|mimes:jpeg,jpg,JPG,JPEG|max:5000',
        ];
    }

}