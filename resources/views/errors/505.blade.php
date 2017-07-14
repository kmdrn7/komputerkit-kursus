@extends('user.layouts.app')

@section('content')

    <div class="error-nav z-depth-1"></div>

    <div class="error-container z-depth-1">
        <div class="container">
            <div class="row no-margin-bottom valign-wrapper" style="height: 100%">
                <div class="valign-container">
                    <div class="col m12 s12 l12 center-align">
                        <img src="{{ asset('img/web/pacman.png') }}" alt="">
                    </div>
                    <div class="col m12 s12 l12 center-align">
                        <p class="error-p">
                            Oops!!! Sepertinya si pacman berbuat jahat :(
                        </p>
                        <p class="error-small">
                            kembali ke halaman utama
                            <a href="{{ url('me') }}" class="btn-custom-revert"><i class="fa fa-reply"></i>&nbsp; Kembali</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
