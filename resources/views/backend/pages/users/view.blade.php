@extends('core::backend.master')
@section('title')
{{{trans('core::core.sidebar.participants')}}} | {{{$participant->participant_fullname}}}
@stop
@section('extend-css')
@stop
@section('body')
<!-- Breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">{{{trans('core::core.sidebar.home')}}}</li>
    <li class="breadcrumb-item">{{{trans('core::core.sidebar.participants')}}}</li>
    <li class="breadcrumb-item active">{{{$participant->participant_fullname}}}</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="hidden-xs hidden-sm col-md-6">
                            <img src="{{{Template::participant_image([])}}}" class="img-avatar">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <h1>{{{trans('core::core.participants.details.title')}}}</h1>
                            <p><b>{{{trans('core::core.participants.details.full_name')}}}</b> : {{{$participant->participant_fullname}}}</p>
                            <p><b>{{{trans('core::core.participants.details.email')}}}</b> : {{{$participant->participant_email}}}</p>
                            @if(!empty($participant->participant_phone))
                            <p><b>{{{trans('core::core.participants.details.phone')}}}</b> : {{{$participant->participant_phone}}}</p>
                            @endif
                            <p><b>{{{trans('core::core.participants.details.status')}}}</b> : {!! Template::status($participant->participant_status) !!}</p>
                            <p><b>{{{trans('core::core.table.registered')}}}</b> : {{{Template::formatDate($participant->created_at)}}}</p>
                        </div>
                    </div> <!-- END OF card-block -->
                </div> <!-- END OF card-->
            </div> <!-- END OF col-md-12 -->
        </div> <!-- END OF row -->
    </div> <!-- END OF animated fadeIn -->
</div> <!-- END OF container-fluid -->
@stop
@section('extend-scripts')
@stop