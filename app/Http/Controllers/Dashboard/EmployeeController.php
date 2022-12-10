<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreEmployeeRequest;
use App\Http\Requests\Dashboard\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{


    public function index(Request $request)
    {
        $this->authorize('view_employees');

        if ($request->ajax())
        {
            if ( $request['company_id'] )
                $filters = [ [ 'company_id', '=', $request['company_id'] ] ];

            $data = getModelData( model: new Employee(), andsFilters: $filters ?? [], relations: [ 'company' => [ 'id','name' ]]);

            return response()->json($data);
        }

        $companies = Company::select('id','name')->get();

        return view('dashboard.employees.index',compact('companies'));
    }

    public function create()
    {
        $this->authorize('create_employees');

        $companies = Company::select('id','name')->get();

        return view('dashboard.employees.create',compact('companies'));
    }


    public function show(Employee $employee)
    {

        $this->authorize('show_employees');

        return view('dashboard.employees.show',compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $this->authorize('update_employees');

        $companies = Company::select('id','name')->get();

        return view('dashboard.employees.edit',compact('employee','companies'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data           = $request->validated();
        $data['status'] = ( bool ) request('status');
        Employee::create($data);
    }

    public function update(UpdateEmployeeRequest $request , Employee $employee)
    {
        $data = $request->validated();

        $data['status'] = ( bool ) request('status');

        $employee->update($data);

    }


    public function destroy(Request $request, Employee $employee)
    {
        $this->authorize('delete_employees');

        if($request->ajax())
            $employee->delete();
    }


}
