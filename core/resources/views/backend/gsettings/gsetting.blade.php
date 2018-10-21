@extends('backend.master')

@section('site-title', 'Admin Account Settings')

@section('styles')
    <link href="{{asset('/assets/backend/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/backend/global/plugins/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
    <form method="POST" action="{{ route('admin.update.general.setting', $general_settings) }}">
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
                        <div class="col-md-4">
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

                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('color') ? ' has-error' : '' }}">
                                <label for="wheel-demo"><strong class="bold uppercase">WEBSITE COLOR</strong></label>
                                <input type="text" name="color" id="wheel-demo" class="form-control demo input-lg" data-control="wheel" value="{{ $general_settings->color }}">
                            </div>
                        </div>

                                                <div class="col-md-5">
                            <div class="form-group {{ $errors->has('google_map') ? ' has-error' : '' }}">
                                <label for="google_map"><strong class="bold uppercase">GOOGLE Map API KEY</strong></label>
                                 <input type="text" name="google_map" id="google_map" class="form-control input-lg" data-control="google_map" value=" {{ $general_settings->google_map }}">
                                @if ($errors->has('google_map'))
                                    <span class="help-block">
                                        {{ $errors->first('google_map') }}
                                    </span>
                                @endif
                            </div>
                        </div>


                    </div>

                    <br>
                   
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