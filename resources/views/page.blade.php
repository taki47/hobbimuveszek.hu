@extends('Layouts.Master')

@section('content')

<!-- Wrapper -->
<div id="wrapper" class="index-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 section">
                {!! $page->body !!}

                @if ( $page->id=="3" )
                    <div class="row">
                        <div class="col-12 col-md-6">
                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }} <br />
                                    @endforeach
                                </div>
                            @endif
                            @if( Session::has('success') )
                                <div class="alert alert-success">
                                {{ Session::get('success') }}
                                </div>
                            @else
                                <form action="{{ route("sendContactForm") }}" id="form" method="POST" name="form-contact">
                                    @csrf
                                    <input type="hidden" name="gRecaptchaResponse" id="gRecaptchaResponse" value="">
                                    <input type="hidden" name="siteKey" id="siteKey" value="{{ env("GCAPTCHA_SITE_KEY") }}">
                                    <div class="form-group">
                                        <input id="inputName" class="form-control" name="name" type="name" placeholder="{{ __("contactPage.form.nameFieldPlaceholder") }}" value="{{ old("name") }}">
                                    </div>
                                    <div class="form-group">
                                        <input id="inputEmail" class="form-control" name="email" type="email" placeholder="{{ __("contactPage.form.emailFieldPlaceholder") }}" value="{{ old("email") }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea id="inputMessage" class="form-control" name="message" rows="5" placeholder="{{ __("contactPage.form.messageFieldPlaceholder") }}">{{ old("message") }}</textarea>
                                    </div>
                                    <button  class="btn btn-success text-white g-recaptcha" type="submit" data-sitekey="{{ env("GCAPTCHA_SITE_KEY") }}" data-callback="sendForm">{{ __("contactPage.form.submitButton") }}</button>
                                </form>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width:40px;" class="pb-3"><span class="fas fa-phone">&nbsp;</span></td>
                                        <td><a href="tel:{{ $global[12]->value }}">{{ $global[12]->value }}</a></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;" class="pb-3"><span class="fas fa-envelope">&nbsp;</span></td>
                                        <td><a href="mailto:{{ $global[13]->value }}">{{ $global[13]->value }}</a></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40px;" class="pb-3"><span class="fas fa-map-marker-alt">&nbsp;</span></td>
                                        <td>{{ $global[14]->value }}</td>
                                    </tr>
                                </tbody>
                            </table>
                    
                            <div class="contact-social">                        
                                <ul>
                                    <li><a href="{{ $global[8]->value }}" class="facebook"><i class="icon-facebook"></i></a></li>
                                    <li><a href="{{ $global[9]->value }}" class="twitter"><i class="icon-twitter"></i></a></li>
                                    <li><a href="{{ $global[10]->value }}" class="instagram"><i class="icon-instagram"></i></a></li>
                                    <li><a href="{{ $global[11]->value }}" class="pinterest"><i class="icon-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->
@endsection