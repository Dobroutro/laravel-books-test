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
            'title' => 'required|max:255',
            'purchase_year' => 'required|min:1800|max:'.date("Y").'|int',            
            'note' => 'max:500',
            'image' => 'image|mimes:jpeg,jpg,JPG,JPEG|max:5000',
        ];
    }

}