@extends('layouts.admins.admin')

@section('admin-tittle')
Education
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/sweetalerts/sweetalert2.min.css') }}">
@endpush

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"><span>Education</span></li>
@endsection

@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                 <a class="btn btn-primary float-right my-3" href="javascript:void(0)" id="createNew"> Create Education</a>
                </div>
            </div>

            {{-- Create Modal --}}
            <div class="modal fade" id="ajaxModal" tabindex="-1" aria-labelledby="ajaxModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleModal"></h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="ajaxForm" name="ajaxForm" class="form-horizontal">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="university">University</label>
                                    <input type="text" name="university" id="university" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="year">Period</label>
                                    <input type="number" name="year" class="form-control" id="year" />
                                </div>
                                <div class="form-group">
                                    <label for="study">Study Program</label>
                                    <input type="text" name="study" id="study" class="form-control" >
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Create Modal --}}

            {{-- Delete Modal --}}
            <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal" data-backdrop="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">WARNING!!!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><b>Are you sure want to delete?</b></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button type="button" class="btn btn-danger" name="btnDelete" id="btnDelete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Delete Modal --}}

            <div class="widget-content widget-content-area br-6">
                <table id="dtable" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th class="no-content dt-no-sorting">No</th>
                            <th>University</th>
                            <th>Period</th>
                            <th>Study Program</th>
                            <th class="no-content dt-no-sorting text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection

@push('script-in')
    <script src="{{ asset('admin/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('admin/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
@endpush

@push('script-ex')
<script>

    $(function () {


        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        var datatable = $('#dtable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! url()->current() !!}'
                },
                columns: [{
                        "data": 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        width: "10%",
                        className: 'text-center'
                    },
                    {
                        data: 'university',
                        name: 'university'
                    },
                    {
                        data: 'year',
                        name: 'year',
                        className: 'text-center'
                    },
                    {
                        data: 'study',
                        name: 'study',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'

                    },
                ],
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 5,
        });

        $('#createNew').click(function () {
                $('#saveBtn').val("createData");
                $('#id').val('');
                $('#ajaxFrom').trigger("reset");
                $('#titleModal').html("Create Education");
                $('#ajaxModal').modal('show');
        });

        $('body').on('click', '.editData', function () {
                var id = $(this).data('id');
                $.get(' education/' + id + '/edit', function (data) {
                    $('#titleModal').html("Edit " + data.university);
                    $('#saveBtn').val("editDataa");
                    $('#ajaxModal').modal('show');
                    $('#id').val(data.id);
                    $('#university').val(data.university);
                    $('#year').val(data.year);
                    $('#study').val(data.study);
                })
        });

        $('#ajaxForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('education.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#ajaxForm').trigger("reset");
                    $("#ajaxModal").modal('hide');
                    var oTable = $('#dtable').dataTable();
                    oTable.fnDraw(false);
                    $("#saveBtn").html('Submit');
                    $("#saveBtn").attr("disabled", false);
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em'
                    });
                    toast({
                        type: 'success',
                        title: data.university + ' data is successfully saved',
                        padding: '2em',
                    })
                },
                error: function (data) {
                    console.log('Error:', data);
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '6em'
                    });
                    toast({
                        type: 'error',
                        title: ' Education must be filled',
                        padding: '2em',
                    })
                    $('#saveBtn').html('Save');
                }
            });
        });

        $(document).on('click', '.deleteData', function () {
            data = $(this).attr('id');
            $('#deleteModal').modal('show');
        });

        $('#btnDelete').click(function () {
                $.ajax({
                    url: "education/" + data,
                    type: 'delete',
                    beforeSend: function () {
                        $('#btnDelete').text('Delete');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('#deleteModal').modal('hide');
                            var oTable = $('#dtable').dataTable();
                            oTable.fnDraw(false);
                            const toast = swal.mixin({
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 3000,
                                padding: '2em'
                            });
                            toast({
                                type: 'success',
                                title: ' Education is successfully delete',
                                padding: '2em',
                            })
                        });

                    }
                })
        })
    });
</script>
@endpush
