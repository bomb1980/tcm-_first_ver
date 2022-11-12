@extends('layouts.app', ['activePage' => 'manage'])

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">ตารางข้อมูลรายงานสรุปข้อมูลผลการจัดกิจกรรมแยกตามกลุ่มหลักสูตร</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="#" class="keychainify-checked">รายงาน</a></li>
                <li class="breadcrumb-item active">ตารางข้อมูลรายงานสรุปข้อมูลผลการจัดกิจกรรมแยกตามกลุ่มหลักสูตร</li>
            </ol>
            <div class="page-header-actions">

            </div>
        </div>

        <div class="page-content container-fluid">
            <div class="panel form-group">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            {!! Form::open([
                                'wire:submit.prevent' => 'submit()',
                                'autocomplete' => 'off',
                                'class' => 'form-horizontal fv-form fv-form-bootstrap4',
                            ]) !!}
                            <div class="form-group row">
                                <label class="col-md-1 form-control-label">ปีงบประมาณ </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">เลือกปีงบประมาณ</option>
                                        <option value="">2565</option>
                                    </select>
                                </div>
                                <label class="col-md-1 form-control-label">ประเภทกิจกรรม </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">เลือกประเภทกิจกรรม</option>
                                        <option value="">กิจกรรมจ้างงานเร่งด่วน</option>
                                        <option value="">กิจกรรมทักษะฝีมือแรงงาน</option>
                                    </select>
                                </div>
                                <label class="col-md-1 form-control-label">ช่วงเวลา </label>
                                <div class="col-md-1">
                                    <input type="text" class="form-control">
                                </div>
                                -
                                <div class="col-md-1">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-1 form-control-label">รูปแบบ </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">เลือกรูปแบบ</option>
                                        <option value="">ภาพรวมประเทศ</option>
                                        <option value="">รายภาค</option>
                                        <option value="">จังหวัด</option>
                                    </select>
                                </div>
                                <label class="col-md-1 form-control-label">ภาค </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">เลือกภาค</option>
                                        <option value="">เหนือ</option>
                                        <option value="">กลาง</option>
                                        <option value="">ตะวันออก</option>
                                        <option value="">ตะวันออกเฉียงเหนือ</option>
                                        <option value="">ใต้</option>
                                    </select>
                                </div>
                                <label class="col-md-1 form-control-label">จังหวัด </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">เลือกจังหวัด</option>
                                        <option value="">กรุงเทพมหานคร</option>
                                        <option value="">กระบี่</option>
                                        <option value="">กาญจนบุรี</option>
                                        <option value="">กาฬสินธุ์</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-1 form-control-label">คำค้น </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="" />
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                                </div>
                                <div class="col-md-5">
                                    <button class="btn btn-primary" wire:click="showReport"><i
                                            class="icon fa-file-word-o pr-1" aria-hidden="true"></i> รายงาน Word</button>
                                    <button class="btn btn-primary" wire:click="exportExcel"><i class="icon fa-file-excel-o"
                                            aria-hidden="true"></i> รายงาน Excel</button>
                                    <a class="btn btn-primary" target="_blank" href="#"><i
                                            class="icon fa-file-pdf-o pr-1" aria-hidden="true"></i>รายงาน PDF</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel form-group">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart1"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel form-group">
                <div class="panel-body container-fluid">
                    <table class="table table-bordered table-hover table-striped dataTable text-center" id="Datatables">
                        <thead>
                            <tr>
                                <td class="text-center">กลุ่มหลักสูตร</td>
                                <td class="text-center">จำนวนกิจกรรมที่จัด</td>
                                <td class="text-center">จำนวนคนที่เข้าร่วม</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">การฝึกทักษะฝีมือ</td>
                                <td class="text-center">5</td>
                                <td class="text-center">50</td>
                            </tr>

                            <tr>
                                <td class="text-left">การฝึกอาชีพในชนบท</td>
                                <td class="text-center">10</td>
                                <td class="text-center">98</td>
                            </tr>

                            <tr>
                                <td class="text-left">การฝึกอาชีพเสริม</td>
                                <td class="text-center">5</td>
                                <td class="text-center">50</td>
                            </tr>
                            <tr>
                                <td class="text-left">การฝึกเสริมทักษะ</td>
                                <td class="text-center">10</td>
                                <td class="text-center">100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        $("select").select2();

        Highcharts.chart('chart1', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: ''
            },
            subtitle: {
                align: 'left',
                text: ''
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'จำนวน'
                }

            },
            legend: {
                enabled: false
            },
            xAxis: {
                categories: [
                    'งวดที่ 1',
                    'งวดที่ 2',
                    'งวดที่ 3',
                    'งวดที่ 4',
                    'งวดที่ 5',
                    'งวดที่ 6',
                    'งวดที่ 7',
                    'งวดที่ 8',
                    'งวดที่ 9',
                    'งวดที่ 10',
                    'งวดที่ 11',
                    'งวดที่ 12'
                ],
                crosshair: true
            },
            // plotOptions: {
            //     series: {
            //         borderWidth: 0,
            //         dataLabels: {
            //             enabled: true,
            //             format: '{point.y:.1f}%'
            //         }
            //     }
            // },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },
            series: [{
                name: 'การฝึกทักษะฝีมือ',
                data: [5, 50]

            }, {
                name: 'การฝึกอาชีพในชนบท',
                data: [10, 98]

            }, {
                name: 'การฝึกอาชีพเสริม',
                data: [5, 50]

            }, {
                name: 'การฝึกเสริมทักษะ',
                data: [10, 100]

            }]
        });
    </script>
@endpush
