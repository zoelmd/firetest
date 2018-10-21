@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> List of Country with Details</h4>
                </div>
                <div class="card-block">
                    <form class="form-horizontal" method="POST" action="{{ route('create.country') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-12 control-label">User Name</label>

                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Password</label>

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
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>

    </div>
@endsection