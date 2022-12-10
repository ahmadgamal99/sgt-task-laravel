"use strict";

// Class definition
let KTDatatable = function () {

    // Shared variables
    let table;
    let datatable;
    let filter;

    // Private functions
    let initDatatable = function () {
        datatable = $("#kt_datatable").DataTable({
            orderable: false,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[4, 'desc']], // display records number and ordering type
            stateSave: false,
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
                data: function () {
                    let datatable = $('#kt_datatable');
                    let info = datatable.DataTable().page.info();
                    datatable.DataTable().ajax.url(`/dashboard/companies?page=${info.page + 1}&per_page=${info.length}`);
                }
            },
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: null},
                {data: 'email'},
                {data: 'revenue'},
                {data: 'website'},
                {data: 'status', name: 'status'},
                {data: 'created_at'},
                {data: null},
            ],
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    render: function (data, type, row) {

                        return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                ${translate('Actions')}
                                <span class="svg-icon svg-icon-5 m-0">
                                    <i class="fa fa-angle-down mx-1"></i>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="/dashboard/companies/${ row.id }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                       <span> ${translate('Edit')} </span>
                                       <span>  <i class="fa fa-edit text-primary"></i> </span>
                                    </a>

                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="/dashboard/companies/${ row.id }" class="menu-link px-3 d-flex justify-content-between" >
                                       <span> ${translate('Show')} </span>
                                       <span>  <i class="fa fa-eye text-black-50"></i> </span>
                                    </a>

                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${row.id}" data-type="${translate('company')}">
                                        <span> ${translate('Delete')} </span>
                                        <span>  <i class="fa fa-trash text-danger"></i> </span>
                                    </a>
                                </div>
                                 <!--end::Menu item-->

                            </div>
                            <!--end::Menu-->
                        `;
                    },
                },
                {
                    targets: 1,
                    orderable: false,
                    render: function (data, type, row) {
                        return `<div class="d-flex align-items-start">
                                    <!--begin::Thumbnail-->

                                    <a class="d-block overlay symbol-50px"  style="height:60px;" data-fslightbox="lightbox-basic" href="${getImagePath( row.logo, 'Companies' )}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded"
                                         style="height:60px;width:60px;border-radius:4px;margin:auto;background-image:url('${getImagePath(row.logo, 'Companies')}');background-size:contain;">
                                    </div>
                                    <!--end::Image-->
                                    <!--begin::Action-->
                                    <div style="width:47px;margin: auto;" class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5 text-start">
                                        <!--begin::Title-->
                                        <a href="/companies/${ row.id }/edit" target="_blank" class="text-gray-800 text-hover-primary fs-5 fw-bold">${ data }</a>
                                        <p class="text-primary fs-7">${ row.employees.length + ' ' + translate('employees') }</p>
                                        <!--end::Title-->
                                    </div>
                            </div>`
                    }
                },
                {
                    targets: 6,
                    orderable: false,
                    render: function (data, type, row) {
                        if ( row.status )
                            return `<div class="badge badge-light-success text-uppercase"> ${ translate('active') } </div>`
                        else
                            return `<div class="badge badge-light-danger text-uppercase"> ${ translate('inactive') } </div>`
                    }
                },{
                    targets: 5,
                    orderable: false,
                    render: function (data, type, row) {
                        if ( row.website )
                            return `<a href="${ row.website }" target="_blank">${ translate('website') }</a>`
                        else
                            return `<h1>-</h1>`
                    }
                },{
                    targets: 4,
                    orderable: false,
                    render: function (data, type, row) {
                            return `<h4>${ data + ' ' } <small><sup>${translate('EGP')}</sup></small> </h4>`
                    }
                },{
                    targets: 2,
                    orderable: false,
                    render: function (data, type, row) {
                        return `<a href="javascript:" class="employees-list fs-7" data-company-id="${row.id}">employees list</a>`
                    }
                }
            ],

        });

        table = datatable.$;

        datatable.on('draw', function () {
            handleDeleteRows();
            KTMenu.createInstances();
            $('body').append(`<script src='${lightboxPath}' ></script>`)
        });
    }

    // general search in datatable
    let handleSearchDatatable = () => {

        $('#general-search-inp').keyup( function () {
            datatable.search( $(this).val() ).draw();
        });

    }

    // Filter Datatable
    let handleFilterDatatable = () => {

        $('.filter-datatable-inp').each( (index , element) =>  {

            $(element).change( function () {

                let columnIndex = $(this).data('filter-index'); // index of the searching column

                datatable.column(columnIndex).search( $(this).val()).draw();
            });

        })
    }

    // Employees Datatable
    let employeesDatatable = () => {

        $(document).on('click','.employees-list', function () {

            let companyId = $(this).attr('data-company-id');

            $.ajax({
                method:'get',
                url:'/dashboard/companies/employees/' + companyId,
                success: ( response ) => {
                    $('#employees-modal').modal('show');
                    $('#employees-modal-body').html(response);
                    companyIdFilter = `&company_id=${companyId}`;

                    if ( $('script[src="/js/dashboard/datatables/employees.js"]').length === 0 )
                        $('body').append(`<script src='/js/dashboard/datatables/employees.js' ></script>`)
                    else
                        KTEmployeesDatatable.init();
                }
            });
        });
    }

    // Delete record
    let handleDeleteRows = () => {

        $('.delete-row').click(function () {

            let rowId = $(this).data('row-id');
            let type  = $(this).data('type');

            deleteAlert(type).then(function (result) {

                if (result.value) {

                    loadingAlert(translate('deleting now ...'));

                    $.ajax({
                        method: 'delete',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '/dashboard/companies/' + rowId,
                        success: () => {

                            setTimeout( () => {

                                successAlert(`${translate('You have deleted the') + ' ' + type + ' ' + translate('successfully !')} `)
                                    .then(function () {
                                        datatable.draw();
                                    });

                            } , 1000)



                        },
                        error: (err) => {

                            if (err.hasOwnProperty('responseJSON')) {
                                if (err.responseJSON.hasOwnProperty('message')) {
                                    errorAlert(err.responseJSON.message);
                                }
                            }
                        }
                    });


                } else if (result.dismiss === 'cancel') {

                    errorAlert( translate('was not deleted !') )

                }
            });
        })
    }




    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            handleFilterDatatable();
            employeesDatatable()
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
});
