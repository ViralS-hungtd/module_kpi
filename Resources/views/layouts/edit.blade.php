@extends('backpack::layout')

@section('content')
<div class="row col-md-12">
        <!-- Default box -->
    @include('crud::inc.grouped_errors')
    <form method="post"
        action="{{ url($crud->route.'/'.$entry->getKey()) }}"
        @if ($crud->hasUploadFields('update', $entry->getKey()))
        enctype="multipart/form-data"
        @endif
        >
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <div class="col-md-12">
            <div class="row display-flex-wrap">
            <!-- load the view from the application if it exists, otherwise load the one in the package -->
                <div class="box col-md-12 padding-20 p-t-20">
                    <input type="hidden" name="id" value="{{$fields['id']['value']}}">
                    @php
                        unset($fields['id']);
                    @endphp
                    @foreach( $fields as $field)
                        @php
                            $fieldsViewNamespace = $field['view_namespace'] ?? 'crud::fields';
                        @endphp
                        <div class="row">
                            <div class="col-md-9">
                                @include($fieldsViewNamespace.'.'.$field['type'], ['field' => $field])
                            </div>
                           {{--  @if(backpack_user()->hasRole(ADMIN))
                                <div class="col-md-3" style="margin-top: 40px">
                                    <button type="submit" class="btn btn-primary edit">{{ trans('labels.update') }}</button>
                                </div>
                            @endif --}}
                        </div>
                    @endforeach
                    @if(backpack_user()->hasRole(ADMIN))
                        <div>
                            @include('admin.description.button.save')
                        </div><!-- /.box-footer-->
                    @endif
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </form>
</div>

@endsection
@section('after_styles')
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/edit.css') }}">

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