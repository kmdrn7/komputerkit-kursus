@extends('errors.main')

@section('content')

    <div class="error-nav z-depth-1"></div>

    <div class="error-container z-depth-1">
        <div class="container">
            <div class="row no-margin-bottom valign-wrapper" style="height: 100%">
                <div class="valign-container">
                    <div class="col m12 s12 l12 center-align">
                        <img class="img-error" src="{{ asset('img/web/police.png') }}" alt="">
                    </div>
                    <div class="col m12 s12 l12 center-align">
                        <p class="error-p">
                            <strong>Oops!!!</strong> Sepertinya kamu masuk halaman yang <strong>terlarang</strong>
                        </p>
                        <p class="error-small">
							kembali ke halaman sebelumnya
                            <a href="javascript:void(0)" onclick="window.history.back()" class="btn-custom-revert"><i class="fa fa-reply"></i>&nbsp; Kembali</a>
                        </p>
						<p class="error-small" style="margin-top: 25px;">
							kembali ke halaman utama
                            <a href="{{ url('me') }}" class="btn-custom-revert"><i class="fa fa-reply"></i>&nbsp; Kembali</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
