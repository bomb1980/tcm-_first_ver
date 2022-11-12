@extends('layouts.app', ['activePage' => 'request'])

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">บันทึกข้อมูลคำขอรับการจัดสรรงบประมาณ</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="#" class="keychainify-checked">ข้อมูลคำขอรับการจัดสรรงบประมาณ</a></li>
                <li class="breadcrumb-item active">บันทึกข้อมูลคำขอรับการจัดสรรงบประมาณ</li>
            </ol>
            <div class="page-header-actions">
                <div class="btn-group btn-group-sm">
                    {{ link_to(route('request.request2_1.create'), ' คำขอทำโครงการจ้างงานเร่งด่วน', [
                        'class' => 'btn
                                    btn-primary
                                    float-right icon wb-plus',
                    ]) }}
                </div>
                <div class="btn-group btn-group-sm">
                    {{ link_to(route('request.request2_2.create'), ' คำขอทำโครงการฝึกทักษะฝีมือแรงงาน', [
                        'class' => 'btn
                                    btn-primary btn-md
                                    float-right icon wb-plus',
                    ]) }}
                </div>
            </div>
        </div>

        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            @livewire('request.reqform.reqform-component')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
