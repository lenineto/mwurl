@extends('layouts.page')

@section('title', 'm-w URL search results')

@section('icon', 'results.svg')

@section('content')
    <section id="search_results">
        <div class="container-fluid mt-2 mt-md-5">
            <div class="row justify-content-center mt-2 pt-2">
                <div class="table-responsive-sm mb-5">
                    @if(count($urls))
                        <h3 class="ml-1 mb-3">URLs Matching &ldquo;{{ $token }}&rdquo;</h3>
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
                                        <td>{{ $url->external }}</td>
                                        <td class="link"><a class="newWindow" href="{{ env('APP_URL') . '/s/' . $url->token }}"
                                                            target="_blank">{{ env('APP_URL') . '/s/' . $url->token }} <i class="mdi mdi-open-in-new"></i></a></td>

                                        <td>{{ $url->created_at }}</td>
                                        <td>{{ $url->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    @else
                        <h3>There are no URLs Matching &ldquo;{{ $token }}&rdquo;</h3>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

