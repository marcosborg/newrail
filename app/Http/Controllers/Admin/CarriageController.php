<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCarriageRequest;
use App\Http\Requests\StoreCarriageRequest;
use App\Http\Requests\UpdateCarriageRequest;
use App\Models\Carriage;
use App\Models\Train;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CarriageController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('carriage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Carriage::with(['train'])->select(sprintf('%s.*', (new Carriage)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'carriage_show';
                $editGate      = 'carriage_edit';
                $deleteGate    = 'carriage_delete';
                $crudRoutePart = 'carriages';

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
            $table->addColumn('train_name', function ($row) {
                return $row->train ? $row->train->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'train']);

            return $table->make(true);
        }

        return view('admin.carriages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('carriage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trains = Train::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carriages.create', compact('trains'));
    }

    public function store(StoreCarriageRequest $request)
    {
        $carriage = Carriage::create($request->all());

        return redirect()->route('admin.carriages.index');
    }

    public function edit(Carriage $carriage)
    {
        abort_if(Gate::denies('carriage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trains = Train::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carriage->load('train');

        return view('admin.carriages.edit', compact('carriage', 'trains'));
    }

    public function update(UpdateCarriageRequest $request, Carriage $carriage)
    {
        $carriage->update($request->all());

        return redirect()->route('admin.carriages.index');
    }

    public function show(Carriage $carriage)
    {
        abort_if(Gate::denies('carriage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carriage->load('train');

        return view('admin.carriages.show', compact('carriage'));
    }

    public function destroy(Carriage $carriage)
    {
        abort_if(Gate::denies('carriage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carriage->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarriageRequest $request)
    {
        $carriages = Carriage::find(request('ids'));

        foreach ($carriages as $carriage) {
            $carriage->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
