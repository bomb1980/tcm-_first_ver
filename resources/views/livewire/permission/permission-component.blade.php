<div>
    <div class="form-group row col-md-12">
        <label class="form-control-label">ค้นหา</label>
        <div class="col-md-3">
            {!! Form::text('search',null, ['oninput'=>'search_in_table()','class' => 'form-control', 'id' => 'search','placeholder'=>'ค้นหา...']) !!}
         </div>
    </div>
    <table class="table table-bordered table-hover table-striped w-full dataTable" id="Datatables">
        <thead>
            <tr>
                <th class="text-center">ลำดับ</th>
                <th class="col-2 text-left">ชื่อ-นามสกุล</th>
                <th class="col-2 text-left">สำนัก/ศูนย์/กอง</th>
                <th class="text-left">กลุ่มงาน</th>
                <th class="text-left">ตำแหน่ง/ระดับ</th>
                <th class="text-left">  สิทธิ์การใช้งาน</th>
                <th class="text-center">แก้ไข</th>
            </tr>
        </thead>
    </table>
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
                url: '{{ route("api.permission.list") }}',
                type: 'GET',
                data: { token: '{{ csrf_token() }}' },
                headers: { 'Authorization': 'Bearer {{ system_key() }}' }
            },
           columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        orderable: false
                    },
                    {
                        data: 'name_user',
                        name: 'name_user',
                        className: 'text-left',
                        orderable: false
                    },

                    {
                        data: 'division_name',
                        name: 'division_name',
                        className: 'text-left',
                        orderable: false
                    },
                    {
                        data: 'dept_name_th',
                        name: 'dept_name_th',
                        className: 'text-left',
                        orderable: false
                    },
                    {
                        data: 'posit_name_th',
                        name: 'posit_name_th',
                        className: 'text-left',
                        orderable: false
                    },
                    {
                        data: 'role_name_th',
                        name: 'role_name_th',
                        className: 'text-left',
                        orderable: false
                    },
                    {
                        data: 'edit',
                        name: 'edit',
                        className: 'text-center',
                        orderable: false
                    }
                ],
            language: {
            url: '{{ asset("assets") }}/js/datatable-thai.json',
            },
            paging: true,
            pageLength:10,
            // ordering:false,
            drawCallback: function(settings) {
                var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            }
        });
        table.on('order.dt', function() {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).search(search).draw();
    }

    function search_in_table(){
        $('#Datatables').DataTable().destroy();
        call_datatable($('#search').val());
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
</div>
