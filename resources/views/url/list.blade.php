@extends('layouts.page')

@section('title', 'm-w URL search results')

@section('icon', 'results.svg')

@section('content')
    <section id="search_results">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center p-3 mt-4">
                    @if(count($urls))

                        <h3 class="section-title pt-3 pb-2">URLs Matching &ldquo;{{ $token }}&rdquo;</h3>

                        <div class="table-responsive">
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
                                                            target="_blank">{{ env('APP_URL') . '/s/' . $url->url_token }} <i class="mdi mdi-open-in-new"></i></a></td>

                                        <td>{{ $url->created_at }}</td>
                                        <td>{{ $url->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3>There are no URLs Matching &ldquo;{{ $token }}&rdquo;</h3>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

