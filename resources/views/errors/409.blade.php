@extends('errors::minimal')

@section('title', __('Token must be unique'))
@section('code', '409')

@if($exception)
    @section('message', $exception->getMessage())

@else
    @section('message', __('Not Found'))
@endif
