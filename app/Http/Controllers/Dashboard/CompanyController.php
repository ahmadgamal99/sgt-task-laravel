<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCompanyRequest;
use App\Http\Requests\Dashboard\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Role;
use Illuminate\Http\Request;

class CompanyController extends Controller
{


    public function index(Request $request)
    {
        $this->authorize('view_companies');

        if ($request->ajax())
        {
            $data = getModelData( model: new Company(), relations: [ 'employees' => ['id','first_name', 'last_name','company_id'] ] );

            return response()->json($data);
        }

        return view('dashboard.companies.index');
    }

    public function companyEmployees(Request $request,$companyId)
    {
        $this->authorize('view_companies');

        if ($request->ajax())
            return view('components.dashboard.employees-table',['companyIdFilter' => $companyId ])->render();

    }

    public function create()
    {
        $this->authorize('create_companies');

        return view('dashboard.companies.create');
    }


    public function show(Company $company)
    {

        $this->authorize('show_companies');

        return view('dashboard.companies.show',compact('company'));
    }

    public function edit(Company $company)
    {
        $this->authorize('update_companies');

        return view('dashboard.companies.edit',compact('company'));
    }

    public function store(StoreCompanyRequest $request)
    {
        $data           = $request->validated();
        $data['status'] = ( bool ) request('status');
        $data['logo']   = uploadImage($request->file('logo'),'Companies');

        Company::create($data);
    }

    public function update(UpdateCompanyRequest $request , Company $company)
    {
        $data = $request->validated();

        $data['status'] = ( bool ) request('status');

        if ( $request->has('logo') )
        {
            deleteImage( $company['logo'],'Companies');
            $data['logo']   = uploadImage($request->file('logo'),'Companies');
        }

        $company->update($data);

    }


    public function destroy(Request $request, Company $company)
    {
        $this->authorize('delete_companies');

        if($request->ajax())
            $company->delete();
    }


}
