@extends('layouts.page')

@section('title', 'm-w URL todo')

@section('icon', 'todo.svg')

@section('content')

    <div class="text">
        <h3>v2.0 To Do List (Russel's)</h3>
        <h4>Now handled in Jira</h4>

        <h3>v2.0 To Do List (Leni's)</h3>
        <ul>
            <li><del>Refactor the routes using the proper 'Controller@method' or an invokable Controller</del></li>
            <li><del>Build the new Controllers and refactor existing ones</del></li>
            <li>Implement the new layout</li>
        </ul>

@endsection
