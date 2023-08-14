<?php

namespace App\Http\Requests;

use App\Models\TrainType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTrainTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('train_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:train_types,id',
        ];
    }
}
