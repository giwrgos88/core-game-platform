@extends('core::backend.master')
@section('title')
{{{trans('core::core.users.roles.edit')}}} - {{{$role->name}}}
@stop
@section('extend-css')
@stop
@section('body')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">{{{trans('core::core.sidebar.home')}}}</li>
    <li class="breadcrumb-item">{{{trans('core::core.users.roles.edit')}}}</li>
    <li class="breadcrumb-item active">{{{$role->name}}}</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{{trans('core::core.users.roles.edit')}}} - {{{$role->name}}}</strong>
                    </div>
                    <div class="card-block">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get("success")}}
                    </div>
                    @endif
                    @if($errors->any())
                       <div class="alert alert-danger">
                       @foreach($errors->all() as $error)
                       <p>{{{$error}}}</p>
                       @endforeach
                       </div>
                    @endif

                    {!! Form::open(['route' => 'Core::admin.users.roles.update', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        <input type="hidden" id="role" name="role" value="{{{$role->id}}}">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">{{{trans('core::core.users.roles.select')}}} : </label>
                            <div class="col-md-9">
                                @foreach($role->permissions as $key => $permission)
                                <div class="checkbox">
                                    <label for="{{{$key}}}">
                                        <input type="checkbox" id="{{{$key}}}" name="permission[{{{$key}}}]" value="{{{$key}}}" @if(in_array($key,$role->relationship)) checked @endif> {{{$permission}}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">{{{trans('core::core.buttons.save')}}}</button>
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