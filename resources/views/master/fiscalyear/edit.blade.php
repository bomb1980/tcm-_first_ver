@extends('layouts.app', ['activePage' => 'master'])

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">ข้อมูลปีงบประมาณ</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="keychainify-checked">หน้าแรก</a></li>
                <li class="breadcrumb-item"><a href="{{ route('master.fiscalyear.index') }}"
                        class="keychainify-checked">ข้อมูลปีงบประมาณ</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">{!!$icon!!}
                        {{ $title }}
                    </h3>
                </header>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            @livewire('master.fiscalyear.fiscalyear-edit-component', ['dataCenterMaster' => $datacentermaster])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

