@extends('core::backend.master')
@section('title')
{{{trans('core::core.sidebar.dashboard')}}}
@stop
@section('extend-css')
@stop
@section('body')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">{{{trans('core::core.sidebar.home')}}}</li>
    <li class="breadcrumb-item active">{{{trans('core::core.sidebar.dashboard')}}}</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <div class="card card-inverse card-primary">
                    <div class="card-block pb-0">
                        <h4 class="mb-0">{{{$dashboard->all_participants}}}</h4>
                        <p>{{{trans('core::core.dashboard.all')}}}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-6">
                <div class="card card-inverse card-info">
                    <div class="card-block pb-0">
                        <h4 class="mb-0">{{{$dashboard->new_participants}}}</h4>
                        <p>{{{trans('core::core.dashboard.new')}}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                    @if (sizeof($dashboard->latest_participants) > 0)
                        <table class="table table-hover table-outline mb-0 hidden-sm-down">
                            <thead class="thead-default">
                                <tr>
                                    <th class="text-xs-center"><i class="icon-people"></i></th>
                                    <th>{{{trans('core::core.table.participant')}}}</th>
                                    <th class="text-xs-center">{{{trans('core::core.table.email')}}}</th>
                                    <th class="text-xs-center">{{{trans('core::core.table.status')}}}</th>
                                    <th class="text-xs-center">{{{trans('core::core.table.action')}}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dashboard->latest_participants as $participant)
                                <tr>
                                    <td class="text-xs-center">
                                        <div class="avatar">
                                            <img src="{{{Template::participant_image($participant->meta->pluck('meta_value','meta_key')->toArray())}}}" class="img-avatar">
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{{$participant->participant_fullname}}}</div>
                                        <div class="small text-muted">
                                            {{{trans('core::core.table.registered')}}}: {{{Template::formatDate($participant->created_at)}}}
                                        </div>
                                    </td>
                                    <td class="text-xs-center">
                                        {{{$participant->participant_email}}}
                                    </td>
                                    <td class="text-xs-center">
                                        {!! Template::status($participant->participant_status) !!}
                                    </td>
                                    <td class="text-xs-center">
                                        <a href="{{URL::route('Core::admin.participants.show', $participant->id)}}" class="btn btn-primary">{{{trans('core::core.buttons.view')}}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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