<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreAdminRequest;
use App\Http\Requests\Dashboard\UpdateAdminRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Traits\HttpResponsesTrait;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Role;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use HttpResponsesTrait;

    public function getTopCompanies( Request $request )
    {
        $perPage = $request['per_page'];
        $page    = $request['page'];

        $companies = Company::query()
                     ->whereStatus(1)
                     ->skip(($page - 1) * $perPage)
                     ->orderBy('revenue','desc')->paginate($perPage);


        return $this->success(
            message: 'top companies' ,
            data: CompanyResource::collection( $companies ),
            meta: [
                'total'     => $companies->total(),
                'per_page'  => $companies->perPage(),
                'page'      => $companies->currentPage(),
            ]
        );

    }

}
