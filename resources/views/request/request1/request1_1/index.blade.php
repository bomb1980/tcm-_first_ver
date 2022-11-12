@extends('layouts.app',['activePage' => 'request'])

@section('content')
<div class="page">
    <div class="page-header">
        <h1 class="page-title">บันทึกประกาศ สรจ. บันทึกคำขอล่วงหน้า</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="#"
                    class="keychainify-checked">บันทึกคำขอ</a></li>
            <li class="breadcrumb-item"><a href="#"
                    class="keychainify-checked">โครงการปีงบประมาณ</a></li>
            <li class="breadcrumb-item active">บันทึกประกาศ สรจ. บันทึกคำขอล่วงหน้า</li>
        </ol>
        <div class="page-header-actions">
            <div class="btn-group btn-group-sm">
                {{ link_to(route('request.request1.request1_1.create'),' เพิ่มปีงบประมาณ',['class'=>'btn
                btn-primary btn-md
                float-right icon wb-plus'])
                }}
            </div>
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">
                        @livewire('request.request11.index-component')
                    </div>
                </div>
                <div class="row row-lg">
                    <div class="col-md-12">
                        <hr>
                        <table>
                            <tr>
                                <td class="col-4">1 คำขอ=จำนวนเงินจากใบคำของบประมาณ</td>
                                <td class="col-4">2 เสนองบ=จำนวนเงินจากใบคำขอที่ผ่านการอนุมัติและทำการเสนองบประมาณ</td>
                                <td class="col-4">3 งบจัดสรร=จำนวนเงินที่ได้การอนุมัติจากสำนักงบประมาณ</td>
                            </tr>
                            <tr>
                                <td class="col-4">4 รับโอน=จำนวนเงินที่ได้รับโอนจากสำนักงบประมาณ</td>
                                <td class="col-4">5 ผูกพัน=จำนวนเงินที่ กยผ โอนให้ สรจ เพื่อดำเนินกิจกรรม</td>
                                <td class="col-4">6 เบิกจ่าย=จำนวนเงิน สรจ เบิกจ่ายในกิจกรรม</td>
                            </tr>
                            <tr>
                                <td class="col-4">7 คงเหลือ=จำนวนเงินที่ กยผ เหลือจากการได้รับจัดสรร</td>
                                <td class="col-4">(7)=(3)-(5)-(6)</td>
                            </tr>
                            {{-- <tr>

                            </tr> --}}
                            {{-- <tr>

                            </tr>
                            <tr>

                            </tr>
                            <tr>

                            </tr>
                            <tr>

                            </tr> --}}
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>

    $(function() {
        call_datatable();
    });

    // function callAjax(val){
    //     $.get('callAjax/'+ val ,function(data){
    //         let array = Object.entries(data);
    //         console.log(array);
    //         $('#carreerno').empty();
    //         array.forEach((currentValue, index, arr) => {
    //             $('#carreerno').append($('<option>', {
    //                 value: currentValue[0],
    //                 text : currentValue[1]
    //             }));
    //         });
    //     });
    //     change_data();
    // }
    // function create_data(){
    //     if($('#courseno').val()&&$('#carreerno').val()){
    //         window.livewire.emit('redirect-to',{ courseno:$('#courseno').val(),carreerno:$('#carreerno').val()});
    //     }
    //     else{
    //         alert("กรุณาระบุ กลุ่มหลักสูตรและสาขาอาชีพ ให้ครบถ้วน");
    //     }
    // }
    function call_datatable() {
        var table = $('#Datatables').DataTable({
            processing: true,
            dom: 'rtp<"bottom"i>',
            ajax: {
                url: '{{ route("api.request.request1_1.list") }}',
                type: 'GET',
                data: { token: '{{ csrf_token() }}',
                fiscalyear_code: $('#fiscalyear_code').val()
                        },
                headers: { 'Authorization': 'Bearer {{ system_key() }}' }
            },
            columns: [
                // { data: 'DT_RowIndex', name: 'DT_RowIndex', className: "text-center", orderable: false},
                { data: 'fiscalyear_code', name: 'fiscalyear_code', className: "text-center", orderable: true },
                // { data: 'startdate_view', name: 'startdate_view', className: "text-center", orderable: true },
                // { data: 'enddate_view', name: 'enddate_view', className: "text-center", orderable: true },
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
@endpush
