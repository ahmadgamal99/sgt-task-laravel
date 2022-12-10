@extends('layouts.master')
@push('styles')
    <link href="{{ asset('assets/css/datatables' . ( isDarkMode() ?  '.dark' : '' ) .'.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        td
        {
            text-align: center;
            vertical-align: middle;
        }

        .modal-content  {
            border-radius: 14px !important;
        }
    </style>
@endpush
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div  class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Companies") }}</h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Companies List") }}
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
                    <a href="{{ route('dashboard.companies.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" title="">

                            <span class="svg-icon svg-icon-2">
                                <i class="fa fa-plus fa-lg"></i>
                            </span>

                        {{ __("add new company") }}

                    </a>
                    <!-- end   :: Add Button -->

                </div>
                <!-- end   :: Toolbar -->



            </div>
            <!-- end   :: Filter -->

            <!-- begin :: Datatable -->
            <table data-ordering="false" id="kt_datatable" class="table text-center table-row-dashed fs-6 gy-5">

                <thead>
                    <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th>#</th>
                        <th class="min-w-200px text-start">{{ __('Name') }}</th>
                        <th class="min-w-100px">{{ __('Employees') }}</th>
                        <th class="min-w-100px">{{ __('Email') }}</th>
                        <th class="min-w-100px">{{ __('Revenue') }}</th>
                        <th class="min-w-100px">{{ __('Website') }}</th>
                        <th class="min-w-100px">{{ __('Status') }}</th>
                        <th class="min-w-100px">{{ __('Created At') }}</th>
                        <th class="min-w-70px">{{ __('Actions') }}</th>
                    </tr>
                </thead>

                <tbody class="text-gray-600 fw-bold text-center">

                </tbody>

            </table>
            <!-- end   :: Datatable -->


        </div>
        <!-- end   :: Card Body -->
    </div>
    <!-- end   :: Datatable card -->


    <!-- start :: Employees Modal -->
    <div class="modal fade rounded" tabindex="-1" id="employees-modal">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Employees</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body" id="employees-modal-body">

                </div>
            </div>
        </div>
    </div>
    <!-- end   :: Employees Modal -->

@endsection
@push('scripts')
    <script>
        let lightboxPath    = "{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}";
        let companyIdFilter = '';
    </script>
    <script src="{{ asset('js/dashboard/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/dashboard/datatables/companies.js') }}"></script>
@endpush
