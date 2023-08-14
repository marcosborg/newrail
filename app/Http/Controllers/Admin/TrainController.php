<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrainRequest;
use App\Http\Requests\StoreTrainRequest;
use App\Http\Requests\UpdateTrainRequest;
use App\Models\Train;
use App\Models\TrainType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TrainController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('train_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Train::with(['train_type'])->select(sprintf('%s.*', (new Train)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'train_show';
                $editGate      = 'train_edit';
                $deleteGate    = 'train_delete';
                $crudRoutePart = 'trains';

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
            $table->addColumn('train_type_name', function ($row) {
                return $row->train_type ? $row->train_type->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'train_type']);

            return $table->make(true);
        }

        return view('admin.trains.index');
    }

    public function create()
    {
        abort_if(Gate::denies('train_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $train_types = TrainType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trains.create', compact('train_types'));
    }

    public function store(StoreTrainRequest $request)
    {
        $train = Train::create($request->all());

        return redirect()->route('admin.trains.index');
    }

    public function edit(Train $train)
    {
        abort_if(Gate::denies('train_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $train_types = TrainType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $train->load('train_type');

        return view('admin.trains.edit', compact('train', 'train_types'));
    }

    public function update(UpdateTrainRequest $request, Train $train)
    {
        $train->update($request->all());

        return redirect()->route('admin.trains.index');
    }

    public function show(Train $train)
    {
        abort_if(Gate::denies('train_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $train->load('train_type');

        return view('admin.trains.show', compact('train'));
    }

    public function destroy(Train $train)
    {
        abort_if(Gate::denies('train_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $train->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainRequest $request)
    {
        $trains = Train::find(request('ids'));

        foreach ($trains as $train) {
            $train->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
