@extends('backpack::layout')
@section('content')
    <div class="row col-md-12">
        <!-- Default box -->
        {{-- @include('crud::inc.grouped_errors') --}}
        <div class="col-md-12">
            <div class="row display-flex-wrap">
                <!-- load the view from the application if it exists, otherwise load the one in the package -->
                <div class="box col-md-12 padding-20 p-t-20">
                    <div>
                        <h3><span>{{ __('labels.mission') }}<span></h3>
                        <br>
                        <div class="text_content kpi-content">{!! $defaultDescription->mission !!}</div>
                    </div>
                    <br>
                    <div>
                        <h3><span>{{ __('labels.vision') }}<span></h3>
                        <br>
                        <div class="text_content kpi-content">{!! $defaultDescription->vision !!}</div>
                    </div>
                    <br>
                    <div>
                        <h3><span>{{ __('labels.core') }}<span></h3>
                        <br>
                        <div class="text_content kpi-content">{!! $defaultDescription->core !!}</div>
                    </div>
                    <br>
                    @if(backpack_user()->hasRole(ADMIN))
                        <a type="button" class="btn btn-success" href="{{ route('crud.description.edit', 1) }}">{{ __('labels.edit') }}</a>
                        <a type="button" class="btn btn-cancel" href="{{ route('crud.description.watch', 1) }}">{{ __('labels.watch') }}</a>
                    @endif
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

@endsection
@section('after_styles')
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/edit.css') }}">
    <style type="text/css">
        h3 span{
            border-bottom: 1px solid green;
        }
        @if(backpack_user()->hasRole(ADMIN))
            div.text_content.kpi-content {
            white-space: nowrap;
            overflow: hidden;
            max-height: 250px;
            text-overflow: ellipsis;
        }
        @endif
    </style>

    <!-- CRUD FORM CONTENT - crud_fields_styles stack -->
    @stack('crud_fields_styles')
@endsection

@section('after_scripts')
    <script src="{{ asset('vendor/backpack/crud/js/crud.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/form.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/edit.js') }}"></script>

    <!-- CRUD FORM CONTENT - crud_fields_scripts stack -->
    @stack('crud_fields_scripts')
@endsection
