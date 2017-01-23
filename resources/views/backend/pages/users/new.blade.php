@extends('core::backend.master')
@section('title')
@if(isset($user)){{{trans('core::core.users.edit.edit')}}} - {{{$user->name}}} @else {{{trans('core::core.users.new.new')}}} @endif
@stop
@section('extend-css')
@stop
@section('body')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">{{{trans('core::core.sidebar.home')}}}</li>
    <li class="breadcrumb-item">{{{trans('core::core.sidebar.users')}}}</li>
    <li class="breadcrumb-item active">@if(isset($user)) {{{$user->name}}} @else {{{trans('core::core.users.new.new')}}} @endif</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>@if(isset($user)) {{{trans('core::core.users.edit.edit')}}} - {{{$user->name}}} @else {{{trans('core::core.users.new.new')}}} @endif</strong>
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
                    @php
                    $route = 'Core::admin.users.store';
                    @endphp

                    @if(isset($user))
                    {!! Form::open(['route' => ['Core::admin.users.update'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    @else
                    {!! Form::open(['route' => 'Core::admin.users.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    @endif
                    @if(isset($user))
                        <input type="hidden" class="form-control" id="id" name="id" value="{{{$user->id}}}">
                    @endif
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">{{{trans('core::core.users.new.full_name')}}} <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{{trans('core::core.users.new.full_name')}}}" @if(isset($user)) value="{{{$user->name}}}" @else value="{{{old('name')}}}" @endif required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email">{{{trans('core::core.users.new.email')}}} <span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{{trans('core::core.users.new.email')}}}" @if(isset($user)) value="{{{$user->email}}}" @else value="{{{old('email')}}}" @endif required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password">{{{trans('core::core.users.new.password')}}} @if(!isset($user)) <span style="color:red">*</span> @endif</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="{{{trans('core::core.users.new.password')}}}" @if(!isset($user)) required @endif>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password_confirmation">{{{trans('core::core.users.new.password_confirmation')}}} @if(!isset($user)) <span style="color:red">*</span> @endif</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{{trans('core::core.users.new.password_confirmation')}}}" @if(!isset($user)) required @endif>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="role">{{{trans('core::core.users.new.password_confirmation')}}} <span style="color:red">*</span></label>
                                @php
                                $role = isset($user) ? $user->role : null;
                                @endphp
                                {{ Form::select('roles', $roles, $role, ['class' => 'form-control']) }}
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