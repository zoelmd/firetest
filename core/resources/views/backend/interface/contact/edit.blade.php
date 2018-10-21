@extends('backend.master')

@section('page_title')

@show

@section('styles')
    <link href="{{asset('/assets/backend/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/backend/global/plugins/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

    <form method="POST" action="{{route('admin.contact.update',$contacts->id)}}" novalidate="">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        {{--basic setting portlet--}}
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-meadow">
                    <i class="icon-settings font-green-meadow"></i>
                    <span class="caption-subject bold uppercase"> Contact Setting</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body clearfix">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('cell_number') ? ' has-error' : '' }}">
                                <label for="phone"><strong class="bold uppercase">PHONE</strong></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                    
                                    <input type="text" id="cell_number" name="cell_number" class="form-control input-lg" placeholder="Cell Number" value="{{ $contacts->cell_number }}">
                                </div>
                                 @if ($errors->has('cell_number'))
                                    <span class="help-block">
                                        {{ $errors->first('cell_number') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email"><strong class="bold uppercase">Email</strong></label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-at"></i>
                                </span>
                                    <input type="email" id="email" name="email" class="form-control input-lg" placeholder="Email" value="{{ $contacts->email }}">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address"><strong class="bold uppercase">Address</strong></label>
                                <textarea id="address" name="address" class="form-control input-lg" placeholder="Address"> {{ $contacts->address }} </textarea>
                                
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        {{ $errors->first('address') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
                                <label for="about"><strong class="bold uppercase">About</strong></label>
                                <textarea id="about" name="about" class="form-control input-lg" placeholder="Address"> {{ $contacts->about }} </textarea>
                                @if ($errors->has('about'))
                                    <span class="help-block">
                                        {{ $errors->first('about') }}
                                    </span>
                                @endif
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