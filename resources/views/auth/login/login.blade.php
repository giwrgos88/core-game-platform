@extends('core::auth.master')
@section('title')
{{{trans('core::core.login.title')}}}
@stop
@section('body')
<div class="container d-table">
    <div class="d-100vh-va-middle">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card-group">
                    <div class="card p-2">
                        <div class="card-block">
                            <h1>{{{trans('core::core.login.title')}}}</h1>
                            <br />
                            {!! Form::open(['route' => ['Core::admin.auth.login'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                            @if ($errors->has('password') || $errors->has('email'))
                                <span class="help-block error">
                                    <strong>{{{trans('core::core.login.login_error')}}}</strong>
                                </span>
                            @endif

                            <div class="input-group mb-1">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" name="email" placeholder="{{{trans('core::core.login.username')}}}">
                            </div>

                            <div class="input-group mb-2">
                                <span class="input-group-addon"><i class="icon-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="{{{trans('core::core.login.password')}}}">
                            </div>
                            <div class="input-group mb-2 ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-xs-6"><button type="submit" class="btn btn-primary px-2">{{{trans('core::core.buttons.login')}}}</button></div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
