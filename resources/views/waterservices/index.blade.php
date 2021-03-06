@extends('layouts.app')
@section('body-class', 'gray-bg')
@section('content')
        <h1 class="pull-left">Waterservices</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.waterservices.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('waterservices.table')
        
@endsection
