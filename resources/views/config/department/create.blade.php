@extends('layouts.app',['activePage' => 'config'])

@section('content')
<div class="page">
    <div class="page-header">
        <h1 class="page-title">ตั้งค่าระบบ หน่วยงาน</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
            <li class="breadcrumb-item"><a href="{{ route('config.department.index') }}"
                    class="keychainify-checked active">หน่วยงาน</a></li>
        </ol>
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title"><i class="icon wb-plus-circle" aria-hidden="true"></i>
                    เพิ่มหน่วยงาน
                </h3>
            </header>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-12">
                        @livewire('config.department-add-component')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
</script>
@endpush
