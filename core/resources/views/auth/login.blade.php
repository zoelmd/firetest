@extends('layouts.frontmaster')

@section('content')
    <div class="main-body">
    <div class="h-100 row align-items-center">
  <div class="col">
   <div class="container" id="login-container">
       
    <div class="row">
        <div class="div-center">
            <div class="col-md-12">
                 <h1 class="text-center" id="login-text">Admin Panel</h1>
                        <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-3 control-label">User Name</label>

                                <div class="col-md-12 admin-login">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-2 control-label">Password</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary col-md-12">
                                      <i class="fa fa-sign-in"></i>  Login
                                    </button>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
    </div>
@endsection
