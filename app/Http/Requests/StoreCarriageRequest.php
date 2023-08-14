<?php

namespace App\Http\Requests;

use App\Models\Carriage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarriageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carriage_create');
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
