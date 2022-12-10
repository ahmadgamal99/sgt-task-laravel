@extends('layouts.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.employees.index') }}"
                    class="text-muted text-hover-primary">{{ __("Employees") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Edit an employee") }}
                    </li>
                    <!-- end   :: Item -->
                </ul>
                <!-- end   :: Breadcrumb -->

            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    <div class="card">
        <!-- begin :: Card body -->
        <div class="card-body p-0">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.employees.update',$employee->id) }}" class="form submitted-form" method="post"  data-redirection-url="{{ route('dashboard.employees.index') }}">
                @csrf
                @method('PUT')

                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Edit an employee") . " : " . $employee->name  }}</h3>
                    <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                        <label class="fs-5 fw-bold">{{ __("Status") }}</label>
                        <input class="form-check-input mx-2" style="height: 18px;width:36px;"
                               type="checkbox" name="status" id="status-switch" {{ $employee->status ? 'checked' : '' }} />
                        <label class="form-check-label" for="status-switch"></label>
                    </div>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">


                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("First Name") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="first_name_inp" name="first_name" value="{{ $employee['first_name'] }}" placeholder="example"/>
                                <label for="first_name_inp">{{ __("Enter the first name") }}</label>
                            </div>
                            <p class="invalid-feedback" id="first_name" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Last Name") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="last_name_inp" name="last_name" value="{{ $employee['last_name'] }}" placeholder="example"/>
                                <label for="last_name_inp">{{ __("Enter the last name") }}</label>
                            </div>
                            <p class="invalid-feedback" id="last_name" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Email") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="email_inp" name="email" value="{{ $employee['email'] }}" placeholder="example"/>
                                <label for="email_inp">{{ __("Enter the email") }}</label>
                            </div>
                            <p class="invalid-feedback" id="email" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Phone") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_inp" name="phone" value="{{ $employee['phone'] }}" placeholder="example"/>
                                <label for="phone_inp">{{ __("Enter the phone") }}</label>
                            </div>
                            <p class="invalid-feedback" id="phone" ></p>


                        </div>
                        <!-- end   :: Column -->


                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Company") }}</label>
                            <select class="form-select" data-control="select2" name="company_id" id="company-sp" data-placeholder="{{ __("Choose the company") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option></option>
                                @foreach( $companies as $company)
                                    <option value="{{ $company->id }}" {{ $employee['company_id'] == $company->id ? 'selected' : '' }}> {{ $company->name }} </option>
                                @endforeach
                            </select>

                            <p class="invalid-feedback" id="company_id" ></p>

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Occupation") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="occupation_inp" name="occupation" value="{{ $employee['occupation'] }}" placeholder="example"/>
                                <label for="occupation_inp">{{ __("Enter the occupation") }}</label>
                            </div>
                            <p class="invalid-feedback" id="occupation" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->


                </div>
                <!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer">

                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary" id="submit-btn">

                        <span class="indicator-label">{{ __("Save") }}</span>

                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!-- end   :: Indicator -->

                    </button>
                    <!-- end   :: Submit btn -->

                </div>
                <!-- end   :: Form footer -->
            </form>
            <!-- end   :: Form -->
        </div>
        <!-- end   :: Card body -->
    </div>

@endsection
