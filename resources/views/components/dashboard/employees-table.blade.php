<div>
    <table data-ordering="false" id="kt_employees_datatable" class="table text-center table-row-dashed fs-6 gy-5">

        <thead>
        <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th>#</th>
            <th>{{ __("name") }}</th>
            <th>{{ __("email") }}</th>
            <th>{{ __("phone") }}</th>
            <th>{{ __("company") }}</th>
            <th>{{ __("occupation") }}</th>
            <th>{{ __("status") }}</th>
            <th>{{ __("created date") }}</th>
            <th class="min-w-100px">{{ __("actions") }}</th>
        </tr>
        </thead>

        <tbody class="text-gray-600 fw-bold text-center">

        </tbody>

    </table>
</div>

@push('scripts')
    <script>
        let companyIdFilter = "&company_id={{ $companyIdFilter }}"
    </script>
    <script src="{{ asset('js/dashboard/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/dashboard/datatables/employees.js') }}"></script>
@endpush
