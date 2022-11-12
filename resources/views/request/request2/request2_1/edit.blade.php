@extends('layouts.app', ['activePage' => 'request'])

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">บันทึกข้อมูลคำขอรับการจัดสรรงบประมาณ (กิจกรรมจ้างงานเร่งด่วน)</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="#" class="keychainify-checked">ข้อมูลคำขอรับการจัดสรรงบประมาณ</a></li>
                {{-- <li class="breadcrumb-item"><a href="#" class="keychainify-checked">โครงการปีงบประมาณ</a></li> --}}
                <li class="breadcrumb-item active">บันทึกข้อมูลคำขอรับการจัดสรรงบประมาณ (กิจกรรมจ้างงานเร่งด่วน)</li>
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
            @livewire('request.request21.edit-component', ['reqform_id' => $reqform_id])
        </div>
    </div>
@endsection
@push('js')

@endpush
