@extends('layouts.dashboard')

@section('title', 'm-w URL dashboard')

@section('icon', 'dashboard.svg')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="row justify-content-center alert-danger mb-0 mt-4">
                <div class="col-12 text-center pt-4 pb-1">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                </div>
            </div>
        @endif
            <div class="row justify-content-center custom-form mb-5 mt-2">
               <form id="updateurl" method="post" action="{{ route('url.update', $url->id) }}">
                    @csrf
                    @method('PUT')
                   <div class="row justify-content-center mt-5">
                        <div class="col-12 text-left">
                            <h3>Edit URL</h3>
                        </div>
                    </div>
                   <div class="row justify-content-center">
                        <div class="col-12">
                            <input class="form-control" type="text" name="original_url" size="40"
                                   value="{{ $url->external }}" required>
                        </div>
                    </div>
                   <div id="shorturl" class="row justify-content-center showhide mt-4 align-items-center">
                       <div class="col-12 col-md-4 text-right pr-0 mr-0">
                           <span>{{ env('APP_URL') . '/s/' }}</span>
                       </div>
                       <div class="col-12 col-md-8 pl-1 mr-0">
                           <input type="hidden" id="token_">
                           <input class="form-control" type="text" name="token" value="{{ $url->token }}" required>
                       </div>
                   </div>
                   <div class="row justify-content-end mt-4">
                       <div class="col-12 col-md-6"></div>
                       <div class="col-12 col-md-6">
                           <input type="checkbox" name="enabled" id="enabled" {{ $url->enabled ? 'checked' : '' }}>
                           <label  class="label" for="enabled">
                               {{ __('Enabled') }}
                           </label>
                       </div>
                   </div>
                   <div class="row justify-content-end mt-3">
                       <div class="col-12 col-md-6"></div>
                       <div class="col-12 col-md-6">
                           <input type="checkbox" name="remember" id="remember"
                                  {{ old('remember') ? 'checked' : '' }} onclick="showhide('shorturl')">
                           <label  class="label" for="remember">
                               {{ __('Random URL') }}
                           </label>
                       </div>
                   </div>
                   <div class="row justify-content-center mt-3">
                       <div class="col-12 col-md-6">
                           <button class="btn btn-custom btn-block" type="submit">{{ __('Create URL') }}</button>
                       </div>
                   </div>
               </form>
            </div>
            <div class="row justify-content-center  mb-5 mt-2">
                <form id="removeurl" method="post" action="{{ route('url.destroy', $url->id) }}">
                    <div class="row justify-content-center mt-3">
                    @csrf
                    @method('DELETE')
                            <button class="btn btn-danger btn-block" type="submit">Delete URL</button>
                    </div>
                </form>
            </div>

    </div>
@endsection
