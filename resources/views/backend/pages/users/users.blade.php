@extends('core::backend.master')
@section('title')
{{{trans('core::core.users.all')}}} {{{trans('core::core.sidebar.users')}}}
@stop
@section('extend-css')
@stop
@section('body')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">{{{trans('core::core.sidebar.home')}}}</li>
    <li class="breadcrumb-item active">{{{trans('core::core.sidebar.users')}}}</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        @if (sizeof($users) > 0)
                        <table class="table table-hover table-outline mb-0 hidden-sm-down">
                            <thead class="thead-default">
                                <tr>
                                    <th>{{{trans('core::core.table.user')}}}</th>
                                    <th class="text-xs-center">{{{trans('core::core.table.email')}}}</th>
                                    <th class="text-xs-center">{{{trans('core::core.table.status')}}}</th>
                                    <th class="text-xs-center">{{{trans('core::core.table.action')}}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div>{{{$user->name}}}</div>
                                        <div class="small text-muted">
                                            {{{trans('core::core.table.registered')}}}: {{{Template::formatDate($user->created_at)}}}
                                        </div>
                                    </td>
                                    <td class="text-xs-center">
                                        {{{$user->email}}}
                                    </td>
                                    <td class="text-xs-center">
                                        {!! Template::status($user->status) !!}
                                    </td>
                                    <td class="text-xs-center">
                                        <a href="{{URL::route('Core::admin.users.edit', $user->id)}}" class="btn btn-primary">{{{trans('core::core.buttons.edit')}}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                        @else
                        <div class="text-xs-center">{{{trans('core::core.no_data')}}}</div>
                        @endif
                    </div> <!-- END OF card-block -->
                </div> <!-- END OF card-->
            </div> <!-- END OF col-md-12 -->
        </div> <!-- END OF row -->
    </div> <!-- END OF animated fadeIn -->
</div> <!-- END OF container-fluid -->
@stop
@section('extend-scripts')
@stop