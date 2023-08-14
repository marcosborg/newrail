<?php

namespace App\Http\Requests;

use App\Models\TrainType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTrainTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('train_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
