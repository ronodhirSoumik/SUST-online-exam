<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamsRequest extends FormRequest
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
            'title' => 'required',
            'start_time' => 'required|date_format:'.config('app.date_format').' H:i:s',
            'duration' => 'max:2147483647|required|numeric',
            'questions.*' => 'exists:questions,id',
        ];
    }
}
