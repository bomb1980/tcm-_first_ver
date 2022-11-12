@extends('layouts.app', ['activePage' => 'result'])

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">บันทึกเวลาเข้าร่วมกิจกรรม</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="#" class="keychainify-checked">กิจกรรม</a></li>
                <li class="breadcrumb-item active">บันทึกเวลาเข้าร่วมกิจกรรม</li>
            </ol>
            <div class="page-header-actions">

            </div>
        </div>

        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            @livewire('activity.assessment.record-attendance-add-component', ['reqform_id' => $reqform_id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
