@extends('backend.layout.master')
@section('backend-head')
@endsection
@section('backend-main')
    <div class="row">
        <div class="col-12">
            @include('common.done')
            @include('common.errors')
        </div>
    </div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">لوحة التحكم الرئيسية</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"> لوحة تحكم "{{ Auth::user()->name }}"</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('backend-footer')

@endsection