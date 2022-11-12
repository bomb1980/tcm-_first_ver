@extends('layouts.app',['activePage' => 'request'])

@section('content')
<div class="page">
    <div class="page-header">
        <h1 class="page-title">รายการตรวจสอบแบบคำขอทำโครงการ</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="#"
                    class="keychainify-checked">บันทึกคำขอ</a></li>
            <li class="breadcrumb-item"><a href="#"
                    class="keychainify-checked">โครงการปีงบประมาณ</a></li>
            <li class="breadcrumb-item active">รายการตรวจสอบแบบคำขอทำโครงการ</li>
        </ol>
        <div class="page-header-actions">
            {{-- <div class="btn-group btn-group-sm">
                {{ link_to(route('request.request2_1.create'),' คำขอทำโครงการจ้างงานเร่งด่วน',['class'=>'btn
                btn-primary
                float-right icon wb-plus'])
                }}
            </div>
            <div class="btn-group btn-group-sm">
                {{ link_to(route('request.request2_2.create'),' คำขอทำโครงการฝึกทักษะฝีมือแรงงาน',['class'=>'btn
                btn-primary btn-md
                float-right icon wb-plus'])
                }}
            </div> --}}
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">
                        @livewire('request.request23.index-component')
                        {{-- @livewire('master.fiscalyear.fiscalyear-component') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @push('js')
<script>

    $(function() {
        call_datatable();
    });

    function create_data(){
        if($('#courseno').val()&&$('#carreerno').val()){
            window.livewire.emit('redirect-to',{ courseno:$('#courseno').val(),carreerno:$('#carreerno').val()});
        }
        else{
            alert("กรุณาระบุ กลุ่มหลักสูตรและสาขาอาชีพ ให้ครบถ้วน");
        }
    }
    function call_datatable() {
        var table = $('#dataTable').DataTable({
            processing: true,
            dom: 'rtp<"bottom"i>',
            language: {
                url: '{{ asset("assets") }}/js/datatable-thai.json',
            },
            paging: true,
            pageLength:10,
            ordering:false,
            drawCallback: function(settings) {
                var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            }
        });

    }
    function change_data() {
        $('#Datatables').DataTable().destroy();
        call_datatable();
        return false;
    }
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
@endpush --}}
@push('js')
<script>
    $(function() {
        call_datatable('');
    });

    function call_datatable(search) {
        var table = $('#Datatables').DataTable({
            processing: true,
            dom: 'rtp<"bottom"i>',
            ajax: {
                url: '{{ route("api.master.fiscalyear.list") }}',
                type: 'GET',
                data: { token: '{{ csrf_token() }}' },
                headers: { 'Authorization': 'Bearer {{ system_key() }}' }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: "text-center", orderable: false},
                { data: 'fiscalyear_code', name: 'fiscalyear_code', className: "text-center", orderable: true },
                { data: 'acttype_name', name: 'acttype_name', className: "text-center", orderable: true },
                { data: 'coursegroup_name', name: 'coursegroup_name', className: "text-center", orderable: true },
                { data: 'coursesubgroup_name', name: 'coursesubgroup_name', className: "text-center", orderable: true },
                { data: 'actname', name: 'actname', className: "text-center", orderable: true },
                { data: 'troubletype_name', name: 'troubletype_name', className: "text-center", orderable: true },
                { data: 'plan_startdate', name: 'plan_startdate', className: "text-center", orderable: true },
                { data: 'plan_enddate', name: 'plan_enddate', className: "text-center", orderable: true },
                { data: '-', name: '-', className: "text-center", orderable: true },
                { data: 'edit', name: 'edit', className: "text-center", orderable: false },
                { data: 'del', name: 'del', className: "text-center", orderable: false }
            ],
            language: {
            url: '{{ asset("assets") }}/js/datatable-thai.json',
            },
            paging: true,
            pageLength:10,
            ordering:false,
            drawCallback: function(settings) {
                var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            }
        });
        table.on('order.dt', function() {

        }).search(search).draw();
    }

    function change_budgetyears() {
        $('#Datatables').DataTable().destroy();
        call_datatable($('#search option:selected').text());
        return false;
    }

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
{{-- @push('js')
<script>

    $(function() {
        call_datatable();
    });

    function call_datatable() {
        var table = $('#Datatables').DataTable({
            processing: true,
            dom: 'rtp<"bottom"i>',
            ajax: {
                url: '{{ route("api.master.fiscalyear.list") }}',
                type: 'GET',
                data: { token: '{{ csrf_token() }}',
                fiscalyear_code: $('#fiscalyear_code').val()
                        },
                headers: { 'Authorization': 'Bearer {{ system_key() }}' }
            },
            columns: [
                { data: 'fiscalyear_code', name: 'fiscalyear_code', className: "text-center", orderable: true },
                { data: 'status', name: 'reqbudget', className: "text-right", orderable: true },
                { data: 'status', name: 'offerbudget', className: "text-right", orderable: true },
                { data: 'status', name: 'allocatebudget', className: "text-right", orderable: true },
                { data: 'status', name: 'transfers', className: "text-right", orderable: true },
                { data: 'status', name: 'bindings', className: "text-right", orderable: true },
                { data: 'status', name: 'withdraws', className: "text-right", orderable: true },
                { data: 'status', name: 'balances', className: "text-right", orderable: true },
                { data: 'edit', name: 'edit', className: "text-center", orderable: false },
                { data: 'del', name: 'del', className: "text-center", orderable: false }
            ],
            language: {
            url: '{{ asset("assets") }}/js/datatable-thai.json',
            },
            paging: true,
            pageLength:10,
            ordering:false,
            drawCallback: function(settings) {
                var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            }
        });

    }
    function change_data() {
        $('#Datatables').DataTable().destroy();
        call_datatable();
        return false;
    }
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
@endpush --}}
