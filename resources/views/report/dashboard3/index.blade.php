@extends('layouts.app', ['activePage' => 'report'])

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Dashborad</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="#" class="keychainify-checked">รายงาน</a></li>
                <li class="breadcrumb-item active">Dashborad</li>
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
                                        <option value="">2565</option>
                                    </select>
                                </div>
                                <label class="col-md-1 form-control-label">งวดที่ </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">เลือกงวด</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
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
                                <label class="col-md-1 form-control-label">ประเภทกิจกรรม </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">กิจกรรมจ้างงานเร่งด่วน</option>
                                        <option value="">กิจกรรมทักษะฝีมือแรงงาน</option>
                                    </select>
                                </div>
                                {{-- <label class="col-md-1 form-control-label">รูปแบบ </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">ประเทศ</option>
                                        <option value="">รายภาค</option>
                                        <option value="">จังหวัด</option>
                                    </select>
                                </div> --}}
                                <label class="col-md-1 form-control-label">ภูมิภาคภาค </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">เลือกภาค</option>
                                    </select>
                                </div>
                                <label class="col-md-1 form-control-label">หน่วยงาน </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">เลือกหน่วยงาน</option>
                                    </select>
                                </div>
                                <label class="col-md-1 form-control-label">มิติข้อมูล </label>
                                <div class="col-md-2">
                                    <select name="" class="form-control" id="">
                                        <option value="">เลือกมิติข้อมูล</option>
                                        <option value="">กิจกรรม</option>
                                        <option value="">หลักสูตร</option>
                                        <option value="">ช่วงอายุ</option>
                                        <option value="">เพศ</option>
                                        <option value="">อาชีพหลัก </option>
                                        <option value="">รายได้</option>
                                    </select>
                                </div>
                                {{-- <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                                </div> --}}
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
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart1"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart7"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart2"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel form-group">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart8"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart72"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart22"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel form-group">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart3"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart73"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart23"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel form-group">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart4"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart74"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart24"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel form-group">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart5"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart75"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart25"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel form-group">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart6"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart76"></div>
                            </figure>
                        </div>
                        <div class="col-md-4 text-center">
                            <figure class="highcharts-figure">
                                <div id="chart26"></div>
                            </figure>
                        </div>
                    </div>
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
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                align: 'left',
                text: 'กิจกรรม'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'กิจกรรมจ้างงานเร่งด่วน',
                    y: 70.67,
                }, {
                    name: 'กิจกรรมทักษะฝีมือแรงงาน',
                    y: 14.77
                }]
            }]
        });

        Highcharts.chart('chart2', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'จังหวัด'
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
                // title: {
                //     text: 'จำนวนสัญญา'
                // }
            },
            yAxis: {
                title: {
                    text: 'สัญญา'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },

            series: [{
                name: "จังหวัด",
                colorByPoint: true,
                data: [{
                        name: "เชียงใหม่",
                        y: 63,
                    },
                    {
                        name: "ลำพูน",
                        y: 19,
                    },
                    {
                        name: "ลำปาง",
                        y: 44,
                    },
                    {
                        name: "อุตรดิตถ์",
                        y: 44,
                    },
                    {
                        name: "แพร่",
                        y: 44,
                    },
                ]
            }]
        });

        Highcharts.chart('chart3', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                align: 'left',
                text: 'เพศ'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'ชาย',
                    y: 35.15,
                }, {
                    name: 'หญิง',
                    y: 64.85,
                }]
            }]
        });

        Highcharts.chart('chart4', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'รายได้'
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
                    'รายได้',
                    'รายได้เสริม'
                ],
                crosshair: true
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },
            series: [{
                name: 'ค่าเฉลี่ยเพศ ชาย',
                data: [35000, 15000]

            }, {
                name: 'ค่าเฉลี่ยเพศ หญิง',
                data: [25000, 35000]

            }]
        });


        Highcharts.chart('chart5', {
            chart: {
                type: 'bar'
            },
            title: {
                align: 'left',
                text: 'อาชีพหลัก'
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
                    'รับจ้าง',
                    'ค้าขาย'

                ],
                crosshair: true
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },
            series: [{
                name: 'รายได้เฉลี่ยต่อเดือนจากอาชีพหลัก',
                data: [150000, 16000]

            }, {
                name: 'รายได้เฉลี่ยนต่อเดือนที่เกิดขึ้นภายหลังจากการฝึกอาชีพ',
                data: [30000, 45000]

            }]
        });

        Highcharts.chart('chart6', {
            chart: {
                type: 'bar'
            },
            title: {
                align: 'left',
                text: 'หลักสูตร'
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
                    'การแปรรูปพืช สมุนไพร',
                    'สานหมวก'

                ],
                crosshair: true
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },
            series: [{
                name: 'รายได้เฉลี่ยต่อเดือนจากอาชีพหลัก',
                data: [15000, 16000]

            }, {
                name: 'รายได้เฉลี่ยนต่อเดือนที่เกิดขึ้นภายหลังจากการฝึกอาชีพ',
                data: [30000, 45000]

            }]
        });

        Highcharts.chart('chart7', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                align: 'left',
                text: 'ภูมิภาค'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                        name: 'ภาคตะวันตก',
                        y: 20,
                    },
                    {
                        name: 'ภาคตะวันออก',
                        y: 20
                    },
                    {
                        name: 'ภาคกลาง',
                        y: 20
                    },
                    {
                        name: 'ภาคเหนือ',
                        y: 20
                    },
                    {
                        name: 'ภาคใต้',
                        y: 10
                    },
                    {
                        name: 'ภาคตะวันออกเฉียงเหนือ',
                        y: 10
                    },
                ]
            }]
        });

        Highcharts.chart('chart8', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'ช่วงอายุ'
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
                    text: 'Total percent market share'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },

            series: [{
                name: "ช่วงอายุ",
                colorByPoint: true,
                data: [{
                        name: "18-25",
                        y: 63,
                    },
                    {
                        name: "26-40",
                        y: 19,
                    },
                    {
                        name: "40-60",
                        y: 4,
                    }
                ]
            }]
        });

        Highcharts.chart('chart22', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'จังหวัด'
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
                // title: {
                //     text: 'จำนวนสัญญา'
                // }
            },
            yAxis: {
                title: {
                    text: 'สัญญา'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },

            series: [{
                name: "จังหวัด",
                colorByPoint: true,
                data: [{
                        name: "เชียงใหม่",
                        y: 63,
                    },
                    {
                        name: "ลำพูน",
                        y: 19,
                    },
                    {
                        name: "ลำปาง",
                        y: 44,
                    },
                    {
                        name: "อุตรดิตถ์",
                        y: 44,
                    },
                    {
                        name: "แพร่",
                        y: 44,
                    },
                ]
            }]
        });

        Highcharts.chart('chart72', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                align: 'left',
                text: 'ภูมิภาค'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                        name: 'ภาคตะวันตก',
                        y: 20,
                    },
                    {
                        name: 'ภาคตะวันออก',
                        y: 20
                    },
                    {
                        name: 'ภาคกลาง',
                        y: 20
                    },
                    {
                        name: 'ภาคเหนือ',
                        y: 20
                    },
                    {
                        name: 'ภาคใต้',
                        y: 10
                    },
                    {
                        name: 'ภาคตะวันออกเฉียงเหนือ',
                        y: 10
                    },
                ]
            }]
        });

        Highcharts.chart('chart23', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'จังหวัด'
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
                // title: {
                //     text: 'จำนวนสัญญา'
                // }
            },
            yAxis: {
                title: {
                    text: 'สัญญา'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },

            series: [{
                name: "จังหวัด",
                colorByPoint: true,
                data: [{
                        name: "เชียงใหม่",
                        y: 63,
                    },
                    {
                        name: "ลำพูน",
                        y: 19,
                    },
                    {
                        name: "ลำปาง",
                        y: 44,
                    },
                    {
                        name: "อุตรดิตถ์",
                        y: 44,
                    },
                    {
                        name: "แพร่",
                        y: 44,
                    },
                ]
            }]
        });

        Highcharts.chart('chart73', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                align: 'left',
                text: 'ภูมิภาค'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                        name: 'ภาคตะวันตก',
                        y: 20,
                    },
                    {
                        name: 'ภาคตะวันออก',
                        y: 20
                    },
                    {
                        name: 'ภาคกลาง',
                        y: 20
                    },
                    {
                        name: 'ภาคเหนือ',
                        y: 20
                    },
                    {
                        name: 'ภาคใต้',
                        y: 10
                    },
                    {
                        name: 'ภาคตะวันออกเฉียงเหนือ',
                        y: 10
                    },
                ]
            }]
        });

        Highcharts.chart('chart24', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'จังหวัด'
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
                // title: {
                //     text: 'จำนวนสัญญา'
                // }
            },
            yAxis: {
                title: {
                    text: 'สัญญา'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },

            series: [{
                name: "จังหวัด",
                colorByPoint: true,
                data: [{
                        name: "เชียงใหม่",
                        y: 63,
                    },
                    {
                        name: "ลำพูน",
                        y: 19,
                    },
                    {
                        name: "ลำปาง",
                        y: 44,
                    },
                    {
                        name: "อุตรดิตถ์",
                        y: 44,
                    },
                    {
                        name: "แพร่",
                        y: 44,
                    },
                ]
            }]
        });

        Highcharts.chart('chart74', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                align: 'left',
                text: 'ภูมิภาค'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                        name: 'ภาคตะวันตก',
                        y: 20,
                    },
                    {
                        name: 'ภาคตะวันออก',
                        y: 20
                    },
                    {
                        name: 'ภาคกลาง',
                        y: 20
                    },
                    {
                        name: 'ภาคเหนือ',
                        y: 20
                    },
                    {
                        name: 'ภาคใต้',
                        y: 10
                    },
                    {
                        name: 'ภาคตะวันออกเฉียงเหนือ',
                        y: 10
                    },
                ]
            }]
        });

        Highcharts.chart('chart25', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'จังหวัด'
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
                // title: {
                //     text: 'จำนวนสัญญา'
                // }
            },
            yAxis: {
                title: {
                    text: 'สัญญา'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },

            series: [{
                name: "จังหวัด",
                colorByPoint: true,
                data: [{
                        name: "เชียงใหม่",
                        y: 63,
                    },
                    {
                        name: "ลำพูน",
                        y: 19,
                    },
                    {
                        name: "ลำปาง",
                        y: 44,
                    },
                    {
                        name: "อุตรดิตถ์",
                        y: 44,
                    },
                    {
                        name: "แพร่",
                        y: 44,
                    },
                ]
            }]
        });

        Highcharts.chart('chart75', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                align: 'left',
                text: 'ภูมิภาค'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                        name: 'ภาคตะวันตก',
                        y: 20,
                    },
                    {
                        name: 'ภาคตะวันออก',
                        y: 20
                    },
                    {
                        name: 'ภาคกลาง',
                        y: 20
                    },
                    {
                        name: 'ภาคเหนือ',
                        y: 20
                    },
                    {
                        name: 'ภาคใต้',
                        y: 10
                    },
                    {
                        name: 'ภาคตะวันออกเฉียงเหนือ',
                        y: 10
                    },
                ]
            }]
        });

        Highcharts.chart('chart26', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'จังหวัด'
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
                // title: {
                //     text: 'จำนวนสัญญา'
                // }
            },
            yAxis: {
                title: {
                    text: 'สัญญา'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
            },

            series: [{
                name: "จังหวัด",
                colorByPoint: true,
                data: [{
                        name: "เชียงใหม่",
                        y: 63,
                    },
                    {
                        name: "ลำพูน",
                        y: 19,
                    },
                    {
                        name: "ลำปาง",
                        y: 44,
                    },
                    {
                        name: "อุตรดิตถ์",
                        y: 44,
                    },
                    {
                        name: "แพร่",
                        y: 44,
                    },
                ]
            }]
        });

        Highcharts.chart('chart76', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                align: 'left',
                text: 'ภูมิภาค'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                        name: 'ภาคตะวันตก',
                        y: 20,
                    },
                    {
                        name: 'ภาคตะวันออก',
                        y: 20
                    },
                    {
                        name: 'ภาคกลาง',
                        y: 20
                    },
                    {
                        name: 'ภาคเหนือ',
                        y: 20
                    },
                    {
                        name: 'ภาคใต้',
                        y: 10
                    },
                    {
                        name: 'ภาคตะวันออกเฉียงเหนือ',
                        y: 10
                    },
                ]
            }]
        });
    </script>
@endpush
