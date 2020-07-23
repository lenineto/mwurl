@extends('layouts.dashboard')

@section('title', 'm-w URL dashboard')

@section('icon', 'dashboard.svg')

@section('content')

    @if ( Auth::check() )
        <h3>URLs Matching &ldquo;{{ $token }}&rdquo;</h3>

        <div class="flex-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Original URL</td>
                    <td>Short URL</td>
                    <td>Created at</td>
                    <td>Last Updated</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tbody>
                @foreach($urls as $url)
                    <tr>
                        <td class="link">{{ $url->long_url }}</td>
                        <td class="link"><a href="{{ route('edit-url') }}/?url={{ $url->id }}">
                            {{ env('APP_URL') . '/' . $url->url_token }}</a></td>

                        <td>{{ $url->created_at }}</td>
                        <td>{{ $url->updated_at }}</td>
                        <td class="link">
                            @if($url->enabled)
                                <a href="{{ route('disable-url') }}/?url={{ $url->id }}">Enabled</a>
                            @else
                                <a href="{{ route('enable-url') }}/?url={{ $url->id }}">Disabled</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @endif

@endsection
