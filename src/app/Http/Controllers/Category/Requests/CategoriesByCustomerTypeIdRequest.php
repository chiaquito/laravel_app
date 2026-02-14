<?php
namespace App\Http\Controllers\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesByCustomerTypeIdRequest extends FormRequest
{
        public function rules(): array
        {
            return [
                // ここにバリデーションルールを定義する
                'customerTypeId' => 'required|integer|min:1|max:3',
            ];
        }


}
