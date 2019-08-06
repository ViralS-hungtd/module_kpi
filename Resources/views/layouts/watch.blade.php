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
                    @endif
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endsection
@section('after_scripts')
    <script src="{{ asset('vendor/backpack/crud/js/crud.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/form.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/edit.js') }}"></script>

    <!-- CRUD FORM CONTENT - crud_fields_scripts stack -->
    @stack('crud_fields_scripts')
@endsection