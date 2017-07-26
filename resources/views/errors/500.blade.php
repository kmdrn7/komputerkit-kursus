@extends('errors.main')

@section('content')

    <div class="error-nav z-depth-1"></div>

    <div class="error-container z-depth-1">
        <div class="container">
            <div class="row no-margin-bottom valign-wrapper" style="height: 100%">
                <div class="valign-container">
                    <div class="col m12 s12 l12 center-align" style="margin-top: 100px">
                        <img class="img-error" src="{{ asset('img/web/500.png') }}" alt="">
                    </div>
                    <div class="col m12 s12 l12 center-align">
                        <p class="error-p">
                            Oops!!! Sepertinya kamu ngerusak halaman ini :(((
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
