@extends('front.master')
@section('body')
@if ( strtotime(Carbon\Carbon::today()->format('d-m-Y H:i')) >= strtotime(str_replace('/', '-', getenv('APPLICATION_END_DATE'))))
    <!-- If competition ends -->
@else
    <!-- If competition still running -->
@endif
@stop
@section('extend-scripts')

@stop