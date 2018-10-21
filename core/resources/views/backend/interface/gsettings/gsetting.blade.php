@extends('backend.layouts.master')

@section('site-title', 'Admin Account Settings')

@section('styles')
    <link href="{{asset('/assets/backend/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/backend/global/plugins/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

    <form method="POST" action="{{ route('admin.dashboard.general-setting.update', $general_settings) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        {{--basic setting portlet--}}
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-meadow">
                    <i class="icon-settings font-green-meadow"></i>
                    <span class="caption-subject bold uppercase"> Basic Setting</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body clearfix">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title"><strong class="bold uppercase">WEBSITE TITLE</strong></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file-text-o"></i>
                                </span>
                                    <input type="text" id="title" name="title" class="form-control input-lg" placeholder="Site Title" value="{{ $general_settings->title }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('color') ? ' has-error' : '' }}">
                                <label for="wheel-demo"><strong class="bold uppercase">WEBSITE COLOR</strong></label>
                                <input type="text" name="color" id="wheel-demo" class="form-control demo input-lg" data-control="wheel" value="{{ $general_settings->color }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone"><strong class="bold uppercase">PHONE</strong></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                    <input type="tel" id="phone" name="phone" class="form-control input-lg" placeholder="Phone" value="{{ $general_settings->phone }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email"><strong class="bold uppercase">Email</strong></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-at"></i>
                                </span>
                                    <input type="email" id="email" name="email" class="form-control input-lg" placeholder="Email" value="{{ $general_settings->email }}">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address"><strong class="bold uppercase">Address</strong></label>
                                <textarea id="address" name="address" class="form-control input-lg" placeholder="Address"> {{ $general_settings->address }} </textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        {{ $errors->first('address') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('google_map') ? ' has-error' : '' }}">
                                <label for="google_map"><strong class="bold uppercase">Google Map</strong></label>
                                <textarea id="google_map" name="google_map" class="form-control input-lg" placeholder="Google Map"> {{ $general_settings->google_map }} </textarea>
                                @if ($errors->has('google_map'))
                                    <span class="help-block">
                                        {{ $errors->first('google_map') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>

                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('base_currency') ? ' has-error' : '' }}">
                                <label for="base_currency"><strong class="bold uppercase">BASE CURRENCY</strong></label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-money"></i>
                                    </span>
                                    <input name="base_currency" id="base_currency" type="text" value="{{ $general_settings->base_currency }}" class="form-control input-lg" placeholder="Base Currency">
                                </div>

                                @if ($errors->has('base_currency'))
                                    <span class="help-block">
                                        {{ $errors->first('base_currency') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('base_currency_symbol') ? ' has-error' : '' }}">
                                <label for="base_currency_symbol"><strong class="bold uppercase">CURRENCY SYMBOL</strong></label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-money"></i>
                                    </span>
                                    <input type="text" id="base_currency_symbol" name="base_currency_symbol" value="{{ $general_settings->base_currency_symbol }}" class="form-control input-lg" placeholder="Currency Symbol">
                                </div>

                                @if ($errors->has('base_currency_symbol'))
                                    <span class="help-block">
                                        {{ $errors->first('base_currency_symbol') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('decimal_point') ? ' has-error' : '' }}">
                                <label for="decimal_point"><strong class="bold uppercase">NUMBER AFTER POINT</strong></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-circle"></i>
                                </span>
                                    <input id="decimal_point" value="{{ $general_settings->decimal_point }}" name="decimal_point" type="text" class="form-control input-lg" placeholder="NUMBER AFTER POINT">
                                </div>

                                @if ($errors->has('decimal_point'))
                                    <span class="help-block">
                                        {{ $errors->first('decimal_point') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('google_site_key') ? ' has-error' : '' }}">
                                <label for="google_site_key"><strong class="bold uppercase">GOOGLE RECAPTCHA SITE KEY</strong></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                    <input type="text" id="google_site_key" value="{{ $general_settings->google_site_key }}" name="google_site_key" class="form-control input-lg" placeholder="GOOGLE RECAPTCHA SITE KEY">
                                </div>
                                @if ($errors->has('google_site_key'))
                                    <span class="help-block">
                                        {{ $errors->first('google_site_key') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('google_secret_key') ? ' has-error' : '' }}">
                                <label for="google_secret_key"><strong class="bold uppercase">GOOGLE RECAPTCHA SECRET KEY</strong></label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input id="google_secret_key" name="google_secret_key" value="{{ $general_settings->google_secret_key }}" type="text" class="form-control input-lg" placeholder="GOOGLE RECAPTCHA SECRET KEY">
                                </div>
                                @if ($errors->has('google_secret_key'))
                                    <span class="help-block">
                                        {{ $errors->first('google_secret_key') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--statuses portlet--}}
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-meadow">
                    <i class="icon-settings font-green-meadow"></i>
                    <span class="caption-subject bold uppercase">STATUS SETTING</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body clearfix">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user_can_reg"><strong class="bold uppercase">USER REGISTRATION</strong></label><br>
                                <input id="user_can_reg" name="user_can_reg" type="checkbox" class="make-switch" {{ $general_settings->user_can_reg ? 'checked' : '' }} data-on-color="success" data-off-color="danger">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email_verify"><strong class="bold uppercase">EMAIL VERIFICATION</strong></label><br>
                                <input id="email_verify" name="email_verify" type="checkbox" class="make-switch" {{ $general_settings->email_verify ? 'checked' : '' }} data-on-color="success" data-off-color="danger">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone_verify"><strong class="bold uppercase">PHONE VERIFICATION</strong></label><br>
                                <input id="phone_verify" name="phone_verify" type="checkbox" class="make-switch" {{ $general_settings->phone_verify ? 'checked' : '' }} data-on-color="success" data-off-color="danger">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="can_withdraw"><strong class="bold uppercase">USER CAN WITHDRAW</strong></label><br>
                                <input id="can_withdraw" name="can_withdraw" type="checkbox" class="make-switch" {{ $general_settings->can_withdraw ? 'checked' : '' }} data-on-color="success" data-off-color="danger">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email_verify"><strong class="bold uppercase">EMAIL NOTIFICATION</strong></label><br>
                                <input id="email_notify" name="email_notify" type="checkbox" class="make-switch" {{ $general_settings->email_notify ? 'checked' : '' }} data-on-color="success" data-off-color="danger">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone_notify"><strong class="bold uppercase">PHONE NOTIFICATION</strong></label><br>
                                <input id="phone_notify" name="phone_notify" type="checkbox" class="make-switch" {{ $general_settings->phone_notify ? 'checked' : '' }} data-on-color="success" data-off-color="danger">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="google_recaptcha"><strong class="bold uppercase">GOOGLE RECAPTCHA VERIFICATION</strong></label><br>
                                <input name="google_recaptcha" id="google_recaptcha" type="checkbox" class="make-switch" {{ $general_settings->google_recaptcha ? 'checked' : '' }} data-on-color="success" data-off-color="danger">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-circle green-meadow btn-block btn-lg uppercase bold"><i class="fa fa-paper-plane-o"></i> Save settings</button>
            </div>
        </div>
        <br><br>
    </form>

@endsection

@section('scripts')
    <script src="{{url('/')}}/assets/backend/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/backend/global/plugins/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/backend/global/plugins/components-color-pickers.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/global/plugins/nice-edit/nice-edit.js') }}" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection