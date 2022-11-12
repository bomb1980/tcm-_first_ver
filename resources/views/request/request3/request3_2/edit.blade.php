@extends('layouts.app', ['activePage' => 'request'])

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">ขั้นตอนพิจารณาแบบคำขอทำโครงการ (กิจกรรมทักษะฝีมือแรงงาน)</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="#" class="keychainify-checked">ขั้นตอนพิจารณาแบบคำขอทำโครงการ</a></li>
                {{-- <li class="breadcrumb-item"><a href="#" class="keychainify-checked">โครงการปีงบประมาณ</a></li> --}}
                <li class="breadcrumb-item active">ขั้นตอนพิจารณาแบบคำขอทำโครงการ (กิจกรรมทักษะฝีมือแรงงาน)</li>
            </ol>
            <div class="page-header-actions">
                <div class="btn-group btn-group-sm">
                    {{-- {{ link_to(route('request.request2.create'),'    ',['class'=>'btn
                btn-primary btn-md
                float-right icon wb-plus'])
                }} --}}
                </div>
            </div>
        </div>

        <div class="page-content container-fluid">
            {{-- <div class="panel">
            <div class="panel-body container-fluid"> --}}
            <div class="row row-lg">
                <div class="col-md-12">
                    @livewire('request.request32.edit-component', ['pullreqform' => $pullreqform])
                </div>
            </div>
            {{-- </div>
        </div> --}}
        </div>
    </div>
@endsection
@push('js')
    <script>
        window.onload = function() {
            Livewire.on('popup', () => {
                swal({
                        title: "บันทึกข้อมูลเรียบร้อย",
                        type: "success",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            window.livewire.emit('redirect-to');
                        }
                    });
            });
        }
    </script>
@endpush
