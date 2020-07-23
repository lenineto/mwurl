@extends('layouts.page')

@section('title', 'm-w URL search')

@section('icon', 'results.svg')

@section('content')
    <h3>URLs Matching &ldquo;{{ $token }}&rdquo;</h3>

    <div class="flex-center">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Original URL</td>
                <td>Short URL</td>
                <td>Created at</td>
                <td>Last Updated</td>
            </tr>
            </thead>
            <tbody>
            @foreach($urls as $url)
                <tr>
                    <td>{{ $url->long_url }}</td>
                    <td class="link"><a class="newWindow" href="{{ env('APP_URL') . '/s/' . $url->url_token }}"
                        target="_blank">{{ env('APP_URL') . '/s/' . $url->url_token }}</a></td>

                    <td>{{ $url->created_at }}</td>
                    <td>{{ $url->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

