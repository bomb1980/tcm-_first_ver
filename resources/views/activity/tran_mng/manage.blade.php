@extends('layouts.app',['activePage' => 'activity'])

@section('content')
<div class="page">
    <div class="page-header">
        <h1 class="page-title">จัดสรรโอนเงิน</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="#"
                    class="keychainify-checked">กิจกรรม</a></li>
            <li class="breadcrumb-item active">จัดสรรโอนเงิน</li>
        </ol>
        <div class="page-header-actions">

        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">
                        @livewire('activity.tran-mng.manage-component')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // $(function() {
    //     call_datatable('');
    // });

    function setSearch(){
        $('#Datatables').DataTable().destroy();
        call_datatable($("#searchBox").val());
        return false;
    }

    // function call_datatable(search) {
    //     var table = $('#Datatables').DataTable({
    //         processing: true,
    //         dom: 'rtp<"bottom"i>',
    //         ajax: {
    //             url: '{{ route("api.activity.ready_confirm.list") }}',
    //             type: 'GET',
    //             data: {
    //                 token: '{{ csrf_token() }}',
    //                 fiscalyear_code: $("#fiscalyear_code").val(),
    //                 dept_id: $("#dept_id").val(),
    //                 acttype_id: $("#acttype_id").val(),
    //                 status: $("#status").val()
    //              },
    //             headers: { 'Authorization': 'Bearer {{ system_key() }}' }
    //         },
    //         columns: [
    //             { data: 'DT_RowIndex', name: 'DT_RowIndex', className: "text-center", orderable: false},
    //             { data: 'reqform_no', name: 'reqform_no', className: "text-center", orderable: true },
    //             { data: 'dept_name_th', name: 'dept_name_th', className: "text-center", orderable: true },
    //             { data: 'acttype_name', name: 'acttype_name', className: "text-center", orderable: true },
    //             { data: 'amphur_name', name: 'amphur_name', className: "text-center", orderable: true },
    //             { data: 'tambon_name', name: 'tambon_name', className: "text-center", orderable: true },
    //             { data: 'moo', name: 'moo', className: "text-center", orderable: true },
    //             { data: 'day_qty', name: 'day_qty', className: "text-center", orderable: true },
    //             { data: 'people_qty', name: 'people_qty', className: "text-center", orderable: true },
    //             { data: 'total_amt', name: 'total_amt', className: "text-center", orderable: true },
    //             { data: 'status_confirm', name: 'status_confirm', className: "text-center", orderable: false },
    //             { data: 'edit', name: 'edit', className: "text-center", orderable: false },
    //             { data: 'del', name: 'del', className: "text-center", orderable: false },
    //         ],
    //         language: {
    //         url: '{{ asset("assets") }}/js/datatable-thai.json',
    //         },
    //         paging: true,
    //         pageLength:10,
    //         ordering:false,
    //         drawCallback: function(settings) {
    //             var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
    //             pagination.toggle(this.api().page.info().pages > 1);
    //         }
    //     });
    //     table.on('order.dt', function() {
    //         // table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function(cell, i) {
    //         //     cell.innerHTML = i + 1;
    //         // });
    //     }).search(search).draw();
    // }

    function change_status(id) {
        $('#status_form' + id).submit();
    }

    function change_delete(id) {

        swal({
            title: 'ยืนยันการ ลบ ข้อมูล ?',
            icon: 'close',
            type: "warning",
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            confirmButtonColor: '#00BCD4',
            cancelButtonColor: '#DD6B55'
        }, function (isConfirm) {
            if(isConfirm) {
                $('#delete_form' + id).submit();
            } else {
                console.log('reject delete');
            }
        });
    }
</script>
@endpush
