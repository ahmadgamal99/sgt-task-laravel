@extends('layouts.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.companies.index') }}"
                    class="text-muted text-hover-primary">{{ __("Companies") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Company data") }}
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
            <form  class="form" >
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Company") . " : " . $company->name  }}</h3>
                    <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                        <label class="fs-5 fw-bold">{{ __("Status") }}</label>
                        <input class="form-check-input mx-2" style="height: 18px;width:36px;"
                               type="checkbox" name="status" id="status-switch" {{ $company->status ? 'checked' : '' }} disabled />
                        <label class="form-check-label" for="status-switch"></label>
                    </div>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">

                    <div class="card-body text-center">
                        <!--begin::Image input-->
                        <x-dashboard.upload-image-inp name="logo" :image="$company->logo" directory="Companies" placeholder="default.jpg" type="show"></x-dashboard.upload-image-inp>
                        <p class="invalid-feedback" id="logo"></p>
                        <!--end::Image input-->
                    </div>

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Email") }}</label>
                            <input type="email" class="form-control" disabled value="{{ $company['email'] }}" />

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Website") }}</label>
                            <input type="text" class="form-control" disabled value="{{ $company['website'] }}" />

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Revenue") }}</label>
                            <input type="number" class="form-control" disabled value="{{ $company['revenue'] }}" />


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <hr class="mx-3 py-1">

                    <div class="p-5">
                        <h4 class="mb-8 underline">Employees</h4>
                        <!-- begin :: Employees Table -->
                        <div class="card rounded shadow p-5">
                            <x-dashboard.employees-table :companyIdFilter="$company['id']"></x-dashboard.employees-table>
                        </div>
                        <!-- end   :: Employees Table -->
                    </div>

                </div>
                <!-- end   :: Inputs wrapper -->



                <!-- begin :: Form footer -->
                <div class="form-footer">

                    <!-- begin :: Submit btn -->
                    <a href="{{ route('dashboard.companies.index') }}" class="btn btn-primary" >
                        <span class="indicator-label">{{ __("Back") }}</span>
                    </a>
                    <!-- end   :: Submit btn -->

                </div>
                <!-- end   :: Form footer -->
            </form>
            <!-- end   :: Form -->
        </div>
        <!-- end   :: Card body -->
    </div>

@endsection
