<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrainTypeRequest;
use App\Http\Requests\StoreTrainTypeRequest;
use App\Http\Requests\UpdateTrainTypeRequest;
use App\Models\TrainType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TrainTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('train_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TrainType::query()->select(sprintf('%s.*', (new TrainType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'train_type_show';
                $editGate      = 'train_type_edit';
                $deleteGate    = 'train_type_delete';
                $crudRoutePart = 'train-types';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.trainTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('train_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainTypes.create');
    }

    public function store(StoreTrainTypeRequest $request)
    {
        $trainType = TrainType::create($request->all());

        return redirect()->route('admin.train-types.index');
    }

    public function edit(TrainType $trainType)
    {
        abort_if(Gate::denies('train_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainTypes.edit', compact('trainType'));
    }

    public function update(UpdateTrainTypeRequest $request, TrainType $trainType)
    {
        $trainType->update($request->all());

        return redirect()->route('admin.train-types.index');
    }

    public function show(TrainType $trainType)
    {
        abort_if(Gate::denies('train_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainTypes.show', compact('trainType'));
    }

    public function destroy(TrainType $trainType)
    {
        abort_if(Gate::denies('train_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainType->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainTypeRequest $request)
    {
        $trainTypes = TrainType::find(request('ids'));

        foreach ($trainTypes as $trainType) {
            $trainType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
