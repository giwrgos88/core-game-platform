@extends('core::backend.master')
@section('title')
{{{trans('core::core.sidebar.export')}}}
@stop
@section('extend-css')
@stop
@section('body')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">{{{trans('core::core.sidebar.home')}}}</li>
    <li class="breadcrumb-item active">{{{trans('core::core.sidebar.export')}}}</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{{trans('core::core.sidebar.export')}}}</strong>
                    </div>
                    <div class="card-block">
                    @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                    @endif
                    {!! Form::open(['route' => 'Core::admin.export.file', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">{{{trans('core::core.export.title_fields')}}} : </label>
                            <div class="col-md-9">
                                @foreach($export->fields as $key => $field)
                                <div class="checkbox">
                                    <label for="{{{$key}}}">
                                        <input type="checkbox" id="{{{$key}}}" name="fields[{{{$key}}}]" value="{{{$key}}}"> {{{$field}}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">{{{trans('core::core.export.title_format')}}} : </label>
                            <div class="col-md-9">
                                @php $count = 0; @endphp
                                @foreach($export->formats as $key => $format)
                                <div class="radio">
                                    <label for="{{{$key}}}">
                                        <input type="radio" id="{{{$key}}}" name="format" value="{{{$key}}}" @if($count == 0) checked="checked" @endif> {{{$format}}}
                                    </label>
                                </div>
                                @php $count++; @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">{{{trans('core::core.buttons.export')}}}</button>
                        </div>
                    {!! Form::close() !!}
                    </div> <!-- END OF card-block -->
                </div> <!-- END OF card-->
            </div> <!-- END OF col-md-12 -->
        </div> <!-- END OF row -->
    </div> <!-- END OF animated fadeIn -->
</div> <!-- END OF container-fluid -->
@stop
@section('extend-scripts')
@stop