@extends('backend.master')

@section('styles')
    <link href="{{asset('/assets/backend/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/backend/global/plugins/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

    <form method="POST" action="{{ route('admin.update.gateway', $gateway->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-meadow">
                    <i class="icon-settings font-green-meadow"></i>
                    <span class="caption-subject bold uppercase"> Bitcoin Account Setting</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body clearfix">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('val1') ? ' has-error' : '' }}">
                                <label for="title"><strong class="bold uppercase">API Key:</strong></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file-text-o"></i>
                                </span>
                                    <input type="text" id="val1" name="val1" class="form-control input-lg" placeholder="Site Title" value="{{ $gateway->val1 }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('val2') ? ' has-error' : '' }}">
                                <label for="title"><strong class="bold uppercase">XPUB Code:</strong></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file-text-o"></i>
                                </span>
                                    <input type="text" id="val2" name="val2" class="form-control input-lg" placeholder="Site Title" value="{{ $gateway->val2 }}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-circle green-meadow btn-block btn-lg uppercase bold"><i class="fa fa-paper-plane-o"></i> Payment settings change</button>
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