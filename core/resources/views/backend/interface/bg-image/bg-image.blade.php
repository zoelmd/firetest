@extends('backend.master')

@section('site-title', 'Admin Account Settings')

@section('styles')
    <link href="{{asset('/assets/backend/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('/assets/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/backend/global/plugins/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

    <form method="POST" action="{{ route('admin.update.BG.image') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{--basic setting portlet--}}
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-meadow">
                    <i class="icon-settings font-green-meadow"></i>
                    <span class="caption-subject bold uppercase">Background Image Change</span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body clearfix">
                    <div class="row">
                        <div class="col-md-6">
                            <label> <h4>  Recharege Section:</h4></label>
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px;" data-trigger="fileinput">
                                        <img style="max-width: 200px; max-height: 150px; width: 100%"
                                         src="{{url('/assets/images/uploads/recharge-section-img.png')}}" 
                                         alt="{{$general_settings->name}}" class="img-responsive">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 250px; line-height: 10px;"></div>
                                    <div>
                                        <span class="btn btn-success btn-file">
                                            <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                            <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                            <input type="file" name="recharge_serction_image" accept="image/*">
                                        </span>
                                        <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                               <label> <h4>  Country Section:</h4></label>
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px;" data-trigger="fileinput">
                                        <img style="max-width: 300px; max-height: 250px; width: 100%"
                                         src="{{url('/assets/images/uploads/countries-section-bg.png')}}" 
                                         alt="{{$general_settings->name}}" class="img-responsive">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                    <div>
                                        <span class="btn btn-success btn-file">
                                            <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                            <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                            <input type="file" name="country_serction_image" accept="image/*">
                                        </span>
                                        <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-circle green-meadow btn-block btn-lg uppercase bold"><i class="fa fa-paper-plane-o"></i> Update</button>
            </div>
        </div>
        <br><br>
    </form>

@endsection

@section('scripts')
    <script src="{{url('/')}}/assets/backend/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/backend/global/plugins/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/backend/pages/scripts/components-color-pickers.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/global/plugins/nice-edit/nice-edit.js') }}" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection