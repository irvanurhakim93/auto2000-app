@extends('layouts.skote.master')

@section('title') Welcome @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')


    @include('common-components.skote.alert-info-n-error')

    <h1>Hallo anj</h1>
@endsection

@section('script')
@endsection