@extends('admin.layouts.app')

@section('content')

	<div class="container">
	    <div class="row">
			<div class="col-login--outter">
		        <div class="col-login--inner">
		            {{-- <div class="row">
		            	<div class="col s12 m12">
		            		<div class="card-panel white">
								<form role="form" method="POST" action="{{ route('admin.login.submit') }}">
			                        {{ csrf_field() }}
									<div class="row">
										<div class="input-field col m6">
											<div class="form-group">
												<label for="email" class="col-md-4 control-label">E-Mail Address</label>
												<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

												@if ($errors->has('email'))
													<span class="help-block">
														<strong>{{ $errors->first('email') }}</strong>
													</span>
												@endif
											</div>
				                        </div>

										<div class="input-field col m6">
											<div class="form-group">
												<label for="password" class="col-md-4 control-label">Password</label>

												<input id="password" type="password" class="form-control" name="password" required>

												@if ($errors->has('password'))
													<span class="help-block">
														<strong>{{ $errors->first('password') }}</strong>
													</span>
												@endif
											</div>
										</div>

				                        <div class="input-field col m12">
											<div class="form-group">

												<p>
													<input type="checkbox" name="remember" id="test5" {{ old('remember') ? 'checked' : '' }} />
													<label for="test5">Remember Me</label>
												</p>
											</div>
				                        </div>

				                        <div class="input-field col m8 offset-m4">
				                            <div class="form-group">
				                                <button type="submit" class="btn btn-primary">
				                                    Login
				                                </button>

				                                <a class="btn btn-link" href="{{ route('admin.password.requests') }}">
				                                    Forgot Your Password?
				                                </a>
				                            </div>
				                        </div>
									</div>
			                    </form>
		            		</div>
		            	</div>
		            </div> --}}

					<div class="card card--login">
		                <div class="card-header" data-background-color="purple">
		                    <h4 class="title">Login Admin</h4>
							<p class="category">Login untuk mengatur kursus</p>
		                </div>
		                <div class="card-content">
		                    <form role="form" method="POST" action="{{ route('admin.login.submit') }}">
								{{ csrf_field() }}
		                        <div class="row">
		                            <div class="col-md-12">
										<div class="form-group label-floating is-empty">
											<label for="email" class="control-label">E-Mail Address</label>
											<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="false">

											@if ($errors->has('email'))
												<span class="material-input">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
		                            </div>
		                        </div>

		                        <div class="row">
		                            <div class="col-md-12">
										<div class="form-group label-floating is-empty">
											<label for="password" class="control-label">Password</label>
											<input id="password" type="password" class="form-control" name="password" required autocomplete="false">

											@if ($errors->has('password'))
												<span class="material-input">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
		                            </div>
		                        </div>

								<div class="row">
									<div class="col-md-12">
										{{-- <div class="form-group"> --}}
											<div class="checkbox">
												<label>
													<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
													Remeber Me
												</label>
											</div>
										{{-- </div> --}}
									</div>
								</div>

								<a class="btn btn-info pull-left" href="{{ route('admin.password.requests') }}">
									Forgot Your Password?
								</a>
		                        <button type="submit" class="btn btn-primary pull-right">Login</button>
		                        <div class="clearfix"></div>
		                    </form>
		                </div>
		            </div>
		        </div>
			</div>
	    </div>
	</div>

@endsection
