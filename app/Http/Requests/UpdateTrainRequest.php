<?php

namespace App\Http\Requests;

use App\Models\Train;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTrainRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('train_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'train_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
