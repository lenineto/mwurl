@extends('layouts.dashboard')

@section('title', 'm-w URL dashboard')

@section('icon', 'dashboard.svg')

@section('content')
    <section>
        <div class="container">
            @isset($success)
                <div class="row justify-content-center" role="alert">
                    <div class="col-12 col-md-10 text-center">
                        <p>{{ $success }}</p>
                    </div>
                </div>
            @endisset
        </div>
        <div class="container-fluid mt-2 mt-md-5">
            <div class="row justify-content-center mt-2 pt-2">
                <div class="table-responsive-sm mb-5">
                    @if(count($urls))
                        <h3 class="ml-1 mb-3">Registered URLs</h3>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Original URL</th>
                                <th>Short URL</th>
                                <th class="d-none d-lg-table-cell">Created at</th>
                                <th class="d-none d-lg-table-cell">Last Updated</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($urls as $url)
                                <tr>
                                    <td class="link">{{ $url->external }}</td>
                                    <td class="link"><a href=" {{ route('url.edit', $url->id) }}">
                                            {{ env('APP_URL') . '/s/' . $url->token }}</a></td>

                                    <td class="d-none d-lg-table-cell">{{ $url->created_at }}</td>
                                    <td class="d-none d-lg-table-cell">{{ $url->updated_at }}</td>
                                    <td class="link">
                                        @if($url->enabled)
                                            <a href="{{ route('url.disable', $url->id) }}">Enabled</a>
                                        @else
                                            <a href="{{ route('url.enable', $url->id) }}">Disabled</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        @isset($token)
                            <h3>There are no URLs Matching &ldquo;{{ $token }}&rdquo;</h3>
                        @endisset
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
