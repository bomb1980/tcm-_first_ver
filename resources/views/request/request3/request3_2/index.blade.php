@extends('layouts.app',['activePage' => 'request'])

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">แบบบันทึกขอทำโครงการ</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="#" class="keychainify-checked">บันทึกคำขอ</a></li>
                <li class="breadcrumb-item">ขั้นตอนตรวจสอบแบบคำขอทำโครงการ</li>
                <li class="breadcrumb-item active">กิจกรรมจ้างงานเร่งด่วน</li>
            </ol>
        </div>

        <div class="page-content container-fluid">
            @livewire('request.request32.index-component')
        </div>
    </div>
@endsection

{{-- @push('js')
    <script>
        $(function() {
            call_datatable('');
        });

        function call_datatable(search) {
            var table = $('#Datatables').DataTable({
                processing: true,
                dom: 'rtp<"bottom"i>',
                ajax: {
                    // url: '{{ route('api.request.request3_2.list') }}',
                    url: '{{ route('api.master.center.master11.list') }}',
                    type: 'GET',
                    data: {
                        token: '{{ csrf_token() }}'
                    },
                    headers: {
                        'Authorization': 'Bearer {{ system_key() }}'
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: "text-center",
                        orderable: false
                    },
                    {
                        data: 'formtopic',
                        name: 'formtopic',
                        className: "text-left",
                        orderable: true
                    },
                    {
                        data: 'edit',
                        name: 'edit',
                        className: "text-center",
                        orderable: false
                    },
                    {
                        data: 'del',
                        name: 'del',
                        className: "text-center",
                        orderable: false
                    }
                ],
                language: {
                    url: '{{ asset('assets') }}/js/datatable-thai.json',
                },
                paging: true,
                pageLength: 10,
                // ordering:false,
                drawCallback: function(settings) {
                    var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                    pagination.toggle(this.api().page.info().pages > 1);
                }
            });
            table.on('order.dt', function() {
                // table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function(cell, i) {
                //     cell.innerHTML = i + 1;
                // });
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
            }, function(isConfirm) {
                if (isConfirm) {
                    $('#delete_form' + id).submit();
                } else {
                    console.log('reject delete');
                }
            });
        }
    </script>
@endpush --}}
