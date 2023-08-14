<?php

namespace App\Http\Requests;

use App\Models\Carriage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarriageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carriage_edit');
    }

    public function rules()
    {
        return [
            'train_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
