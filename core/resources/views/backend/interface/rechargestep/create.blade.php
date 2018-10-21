@extends('backend.master')

@section('main-content')
   <style type="text/css">
  .errors-message{
    position: absolute;
    top:5%;
    left: 10%;
    z-index: 9999;
  }
  .erro-msg{
    margin: 3px;
    padding: 8px;
    border-radius: 0;
    border-left: 2px solid red;
  }
</style>

    <div class="col-md-6 col-md-offset-3 errors-message">
     @if ($errors->any())
         @foreach ($errors->all() as $error)
            <div class="alert alert-danger erro-msg">{{ $error }}
            </div>

         @endforeach
     @endif
     </div>
   <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-meadow">
                        <i class="fa fa-plus-square font-green-meadow"></i>
                        <span class="caption-subject bold uppercase" >Add Recharge</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <form method="POST" action="{{route('admin.recharegeStep.save')}}" class="clearfix" ENCTYPE="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label bold uppercase" for="title">Title : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-navicon"></i></span>
                                <input type="text" id="title" class="form-control has-error " name="title" placeholder="Feature Title" value="{{ old('title') }}" required>
                            </div>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>

                         <div class="form-group {{ $errors->has('order') ? ' has-error' : '' }}">
                            <label class="control-label bold uppercase" for="order">Order : </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort"></i></span>
                                <select name="order_id" class="form-control">
                                    @php $i = 1 @endphp

                                    @foreach( App\RechargeStep::All() as $step)
                                   
                                    <option value="{{$step->id}}">{{$i++}} - {{$step->name}}</option>
                                    @endforeach
                                   
                                    <option value="{{$i}}" selected="">{{$i}} - New Order</option>
                                </select>
                            </div>
                            @if ($errors->has('order'))
                                <span class="help-block">
                                    {{ $errors->first('order') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('icon') ? ' has-error' : '' }}">
                            <label class="control-label bold uppercase" for="icon">Icon <a href="http://www.fontawesome.io/icons/">[ Fontawesome ] </a>: </label>
                            <div class="input-group">
                                <span class="input-group-addon">fa fa-</i></span>
                                <input type="text" id="icon" class="form-control has-error " name="icon" placeholder="Font Awesome icon code with fa fa-, eg: 'address-card'" value="{{ old('icon') }}" required>
                            </div>
                            @if ($errors->has('icon'))
                                <span class="help-block">
                                    {{ $errors->first('icon') }}
                                </span>
                            @endif
                        </div>

                        <br>

                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label  for="description" class="control-label bold uppercase">Description: </label>
                            <textarea id="description" class="form-control" name="description" rows="5"></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    {{ $errors->first('description') }}
                                </span>
                            @endif
                        </div>

                        <br>

                        <br>
                        <div class="form-group">
                            <label for="status"><strong class="bold uppercase">Status:</strong></label><br>
                            <input id="status" name="status" type="checkbox" class="make-switch"  data-on-color="success" data-off-color="danger">
                        </div>

                        <br>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button class="btn btn-circle btn-lg btn-block green-meadow uppercase bold"> <i class="fa fa-plus-square" type="submit"></i> Add Recharge Step </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{url('/')}}/assets/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/backend/global/plugins/nice-edit/nice-edit.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

    @if (session('alert'))
        <script type="text/javascript">
            $(document).ready(function(){
                swal("Sorry!", "{!! session('alert') !!}", "error");
            });
        </script>

    @elseif (session('success'))
        <script type="text/javascript">
            $(document).ready(function(){
                swal("Success!", "{!! session('success') !!}", "success");
            });
        </script>

    @endif

@endsection