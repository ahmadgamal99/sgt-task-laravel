@extends('layouts.master')
@push('styles')
    <link href="{{ asset('assets/css/datatables' . ( isDarkMode() ?  '.dark' : '' ) .'.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div  class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Employees") }}</h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Employees List") }}
                    </li>
                    <!-- end   :: Item -->
                </ul>
                <!-- end   :: Breadcrumb -->

            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    <!-- begin :: Datatable card -->
    <div class="card mb-2">
        <!-- begin :: Card Body -->
        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">

            <!-- begin :: Filter -->
            <div class="d-flex flex-stack flex-wrap mb-15">

                <!-- begin :: General Search -->
                <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">

                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                               <i class="fa fa-search fa-lg" ></i>
                        </span>

                    <input type="text" class="form-control form-control-solid w-250px ps-15 border-gray-300 border-1" id="general-search-inp" placeholder="{{ __("Search ...") }}">

                    <select class="form-select form-select-solid border-gray-300 border-1 filter-datatable-inp ms-5 w-200px" data-filter-index="4" data-control="select2" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" data-placeholder="{{ __("Choose the company") }}" >
                        <option value="" selected></option>
                        <option value="all">{{ __("All") }}</option>
                        @foreach( $companies as $company)
                            <option value="{{ $company['id'] }}"> {{ $company['name'] }} </option>
                        @endforeach
                    </select>

                    <select class="form-select form-select-solid border-gray-300 border-1 filter-datatable-inp ms-5 w-200px" data-filter-index="6" data-control="select2" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" data-placeholder="{{ __("Choose the status") }}" >
                        <option value="" selected></option>
                        <option value="all">{{ __("All") }}</option>
                        <option value="1" >{{ __('active') }}</option>
                        <option value="0" >{{ __('inactive') }}</option>
                    </select>

                </div>
                <!-- end   :: General Search -->

                <!-- begin :: Toolbar -->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

                    <!-- begin :: Add Button -->
                    <a href="{{ route('dashboard.employees.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" title="">

                            <span class="svg-icon svg-icon-2">
                                <i class="fa fa-plus fa-lg"></i>
                            </span>

                        {{ __("add new employee") }}

                    </a>
                    <!-- end   :: Add Button -->

                </div>
                <!-- end   :: Toolbar -->



            </div>
            <!-- end   :: Filter -->

            <!-- begin :: Datatable -->
            <x-dashboard.employees-table></x-dashboard.employees-table>
            <!-- end   :: Datatable -->


        </div>
        <!-- end   :: Card Body -->
    </div>
    <!-- end   :: Datatable card -->

@endsection

