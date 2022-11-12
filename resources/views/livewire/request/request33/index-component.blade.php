<div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            {{ Form::select('fiscalyear_code', $fiscalyear_list, $fiscalyear_code, ['id' => 'fiscalyear_code', 'onchange' => 'setSearch()', 'class' => 'form-control select2', 'placeholder' => '--เลือกปีงบประมาณ--']) }}
        </div>
        <div class="col-md-2">
            {{ Form::select('dept_id', $dept_list, $dept_id, ['id' => 'dept_id', 'onchange' => 'setSearch()', 'class' => 'form-control select2', 'placeholder' => '--เลือกประเภทหน่วยงาน--']) }}
        </div>
        <div class="col-md-2">
            {{ Form::select('acttype_id', $acttype_list, $acttype_id, ['id' => 'acttype_id', 'onchange' => 'setSearch()', 'class' => 'form-control select2', 'placeholder' => '--เลือกประเภทกิจกรรม--']) }}
        </div>
        <div class="col-md-2">
            <select class="form-control form-group select2" id="status" onchange="setSearch()">
                <option value="">--เลือกสถานะใบคำขอ--</option>
                <option value="1">บันทึกร่าง</option>
                <option value="2">รอพิจารณา</option>
                <option value="3">ผ่าน</option>
                <option value="4">ไม่ผ่าน</option>
                <option value="9">ยกเลิก</option>
            </select>
        </div>

        <div class="col-md-2 input-group form-group">
            <input type="search" class="form-control" id="serachbox" oninput="setSearch()"
                placeholder="คำค้น (Keyword)" />
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <div class="row">
        {{-- <div class="col-2 text-center bg-green-100">
            <p><strong>ช่วงวันที่รวบรวมคำขอ</strong></p>
            <p>01/10/2565 - 30/03/2566</p>
            <p>เหลือระยะเวลาอีก</p>
            <p>60 วัน</p>
        </div> --}}
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <div class="card card-inverse bg-secondary">
                <div class="card-block text-center">
                    <h1 class="card-title"><img src="{{ asset('assets/images/9.png') }}" width="60px;" alt="">
                    </h1>
                    <p class="h4 text-white font-weight-bold">บันทึกร่าง</p>
                    <p class="font-weight-bold text-white"><span id="col2"></span> รายการ</p>
                    <p class="font-weight-bold text-white">จำนวนเงิน <span id="col1"></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-inverse bg-warning">
                <div class="card-block text-center">
                    <h1 class="card-title"><img src="{{ asset('assets/images/2.png') }}" width="60px;" alt="">
                    </h1>
                    <p class="h4 text-white font-weight-bold">รอพิจารณา</p>
                    <p class="font-weight-bold text-white"><span id="col4"></span> รายการ</p>
                    <p class="font-weight-bold text-white">จำนวนเงิน <span id="col3"></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-inverse bg-success">
                <div class="card-block text-center">
                    <h1 class="card-title"><img src="{{ asset('assets/images/3.png') }}" width="60px;" alt="">
                    </h1>
                    <p class="h4 text-white font-weight-bold">ผ่าน</p>
                    <p class="font-weight-bold text-white"><span id="col6"></span> รายการ</p>
                    <p class="font-weight-bold text-white">จำนวนเงิน <span id="col5"></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-inverse bg-danger">
                <div class="card-block text-center">
                    <h1 class="card-title"><img src="{{ asset('assets/images/8.png') }}" width="60px;" alt="">
                    </h1>
                    <p class="h4 text-white font-weight-bold">ไม่ผ่าน</p>
                    <p class="font-weight-bold text-white"><span id="col8"></span> รายการ</p>
                    <p class="font-weight-bold text-white">จำนวนเงิน <span id="col7"></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-inverse bg-primary">
                <div class="card-block text-center">
                    <h1 class="card-title"><img src="{{ asset('assets/images/7.png') }}" width="60px;" alt="">
                    </h1>
                    <p class="h4 text-white font-weight-bold">รวม</p>
                    <p class="font-weight-bold text-white"><span id="col12"></span> รายการ</p>
                    <p class="font-weight-bold text-white">จำนวนเงิน <span id="col11"></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-10 offset-1 row form-group" id="alert">
        <div class="col-md-6 pt-2">
            <p><strong>ช่วงวันที่รวบรวมคำขอ : </strong><span id="st"></span> - <span id="en"></span></p>
        </div>
        <div class="offset-3 col-md-3 pt-2 text-right">
            <p><strong>เหลือระยะเวลาอีก : </strong><span id="diff"></span> วัน</p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped w-full dataTable" id="Datatables">
            <thead>
                <tr>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">เลขที่คำขอ</th>
                    <th class="text-center">หน่วยงาน</th>
                    <th class="text-center">ชื่อประเภทกิจกรรม</th>
                    <th class="text-center">อำเภอ</th>
                    <th class="text-center">ตำบล</th>
                    <th class="text-center">หมู่</th>
                    <th class="text-center">จำนวนวัน</th>
                    <th class="text-center">จำนวนคน</th>
                    <th class="text-center">รวม</th>
                    <th class="text-center">สถานะใบคำขอ</th>
                    <th class="text-center">แก้ไข</th>
                    {{-- <th class="text-center">ลบ</th> --}}
                </tr>
            </thead>
        </table>
    </div>

    <script>
        Livewire.on('emits', () => {
            $('.select2').select2();
        });
    </script>

</div>

@push('js')
    <script>
        $('.select2').select2();

        $(function() {
            call_datatable('');
            setRequestDateBar();
            setRequestSeperate();
        });

        function setSearch() {
            $('#Datatables').DataTable().destroy();
            call_datatable($("#serachbox").val());
            setRequestDateBar();
            setRequestSeperate();
            return false;
        }

        function setRequestDateBar() {
            $.ajax({
                url: '{{ route('api.request.reqform_years_noti.detail') }}',
                type: 'GET',
                data: {
                    token: '{{ csrf_token() }}',
                    fiscalyear_code: $("#fiscalyear_code").val()
                },
                headers: {
                    'Authorization': 'Bearer {{ system_key() }}'
                },
                success: function(data) {
                    // console.log(data);
                    $("#diff").text(addCommas(data.diff));
                    $("#st").text(data.st);
                    $("#en").text(data.en);
                    $("#alert").css({
                        "background-color": data.alert
                    });
                }
            });
        }

        function setRequestSeperate() {
            $.ajax({
                url: '{{ route('api.request.reqform_seperate.list') }}',
                type: 'GET',
                data: {
                    token: '{{ csrf_token() }}',
                    fiscalyear_code: $("#fiscalyear_code").val(),
                    dept_id: $("#dept_id").val(),
                    acttype_id: $("#acttype_id").val()
                },
                headers: {
                    'Authorization': 'Bearer {{ system_key() }}'
                },
                success: function(data) {
                    // console.log(data);
                    $("#col1").text(addCommas(data.col1 ?? 0));
                    $("#col2").text(addCommas(data.col2 ?? 0));
                    $("#col3").text(addCommas(data.col3 ?? 0));
                    $("#col4").text(addCommas(data.col4 ?? 0));
                    $("#col5").text(addCommas(data.col5 ?? 0));
                    $("#col6").text(addCommas(data.col6 ?? 0));
                    $("#col7").text(addCommas(data.col7 ?? 0));
                    $("#col8").text(addCommas(data.col8 ?? 0));
                    $("#col11").text(addCommas(data.col11 ?? 0));
                    $("#col12").text(addCommas(data.col12 ?? 0));
                }
            });
        }

        function addCommas(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }

        function call_datatable(search) {
            var table = $('#Datatables').DataTable({
                processing: true,
                dom: 'rtp<"bottom"i>',
                ajax: {
                    url: '{{ route('api.request.request3_3.list') }}',
                    type: 'GET',
                    data: {
                        token: '{{ csrf_token() }}',
                        fiscalyear_code: $("#fiscalyear_code").val(),
                        dept_id: $("#dept_id").val(),
                        acttype_id: $("#acttype_id").val(),
                        status: $("#status").val()
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
                        data: 'reqform_no',
                        name: 'reqform_no',
                        className: "text-center",
                        orderable: true
                    },
                    {
                        data: 'dept_name_th',
                        name: 'dept_name_th',
                        className: "text-center",
                        orderable: true
                    },
                    {
                        data: 'acttype_name',
                        name: 'acttype_name',
                        className: "text-center",
                        orderable: true
                    },
                    {
                        data: 'amphur_name',
                        name: 'amphur_name',
                        className: "text-center",
                        orderable: true
                    },
                    {
                        data: 'tambon_name',
                        name: 'tambon_name',
                        className: "text-center",
                        orderable: true
                    },
                    {
                        data: 'moo',
                        name: 'moo',
                        className: "text-center",
                        orderable: true
                    },
                    {
                        data: 'day_qty',
                        name: 'day_qty',
                        className: "text-right",
                        orderable: true
                    },
                    {
                        data: 'people_qty',
                        name: 'people_qty',
                        className: "text-right",
                        orderable: true
                    },
                    {
                        data: 'total_amt',
                        name: 'total_amt',
                        className: "text-right",
                        orderable: true
                    },
                    {
                        data: 'status_confirm',
                        name: 'status_confirm',
                        className: "text-center",
                        orderable: false
                    },
                    {
                        data: 'edit',
                        name: 'edit',
                        className: "text-center",
                        orderable: false
                    },
                ],
                language: {
                    url: '{{ asset('assets') }}/js/datatable-thai.json',
                },
                paging: true,
                pageLength: 10,
                ordering: false,
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

        // function call_datatable(search) {
        //     var table = $('#Datatables').DataTable({
        //         processing: true,
        //         dom: 'rtp<"bottom"i>',
        //         ajax: {
        //             url: '{{ route('api.request.reqform.list') }}',
        //             type: 'GET',
        //             data: {
        //                 token: '{{ csrf_token() }}',
        //                 fiscalyear_code: $("#fiscalyear_code").val(),
        //                 dept_id: $("#dept_id").val(),
        //                 acttype_id: $("#acttype_id").val(),
        //                 status: $("#status").val()
        //             },
        //             headers: {
        //                 'Authorization': 'Bearer {{ system_key() }}'
        //             }
        //         },
        //         columns: [{
        //                 data: 'DT_RowIndex',
        //                 name: 'DT_RowIndex',
        //                 className: "text-center",
        //                 orderable: false
        //             },
        //             {
        //                 data: 'reqform_no',
        //                 name: 'reqform_no',
        //                 className: "text-center",
        //                 orderable: true
        //             },
        //             {
        //                 data: 'dept_name_th',
        //                 name: 'dept_name_th',
        //                 className: "text-center",
        //                 orderable: true
        //             },
        //             {
        //                 data: 'acttype_name',
        //                 name: 'acttype_name',
        //                 className: "text-center",
        //                 orderable: true
        //             },
        //             {
        //                 data: 'amphur_name',
        //                 name: 'amphur_name',
        //                 className: "text-center",
        //                 orderable: true
        //             },
        //             {
        //                 data: 'tambon_name',
        //                 name: 'tambon_name',
        //                 className: "text-center",
        //                 orderable: true
        //             },
        //             {
        //                 data: 'moo',
        //                 name: 'moo',
        //                 className: "text-center",
        //                 orderable: true
        //             },
        //             {
        //                 data: 'day_qty',
        //                 name: 'day_qty',
        //                 className: "text-right",
        //                 orderable: true
        //             },
        //             {
        //                 data: 'people_qty',
        //                 name: 'people_qty',
        //                 className: "text-right",
        //                 orderable: true
        //             },
        //             {
        //                 data: 'total_amt_format',
        //                 name: 'total_amt_format',
        //                 className: "text-right",
        //                 orderable: true
        //             },
        //             {
        //                 data: 'status_confirm',
        //                 name: 'status_confirm',
        //                 className: "text-center",
        //                 orderable: false
        //             },
        //             {
        //                 data: 'edit',
        //                 name: 'edit',
        //                 className: "text-center",
        //                 orderable: false
        //             },
        //         ],
        //         language: {
        //             url: '{{ asset('assets') }}/js/datatable-thai.json',
        //         },
        //         paging: true,
        //         pageLength: 10,
        //         ordering: false,
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
        //     // table.columns(2).search($("#fiscalyear_code").val()).draw();
        //     // table.columns(8).search($("#leave_status").val()).draw();
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
            }, function(isConfirm) {
                if (isConfirm) {
                    $('#delete_form' + id).submit();
                } else {
                    console.log('reject delete');
                }
            });
        }
    </script>
@endpush
