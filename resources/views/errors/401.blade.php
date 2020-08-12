@extends('errors::minimal')

@section('title', __('Unauthorized Request'))
@section('code', '401')

@if($exception)
    @section('message', $exception->getMessage())

@else
    @section('message', __('Not Found'))
@endif
