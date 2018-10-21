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

    <div class="container">
        <div class="col-md-11">
           <div class="portlet light bordered">
             <div class="portlet-title">
                  <div class="caption">
                      <span class="caption-subject font-dark bold uppercase">All Operator List</span>
                  </div>
                  <div class="actions">
                     <button type="button" class="btn btn-sm btn-info button-mediam" data-toggle="modal" data-target="#createModal"> Add New Operator</button>
                  </div>
              </div>
              <div class="portlet-body">
                    <table class="table" id="operator-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>DialCode</th>
                            <th>Currency</th>
                            <th>Recharge Limit</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($operators as $operator)
                            <tr>
                                <td>{{$operator->id}}</td>
                                <td>{{$operator->operator_name}}</td>
                                <td>{{$operator->country->country_name}}</td>
                                <td>{{$operator->operator_code}}</td>
                                 <td>{{$operator->country->currency_code}}</td>
                                <td>Min: {{$operator->min_recharge}} & Max: {{$operator->max_recharge}}</td>
                                <td><div class="btn-group" data-toggle="buttons">
                                        <button type="button" class="btn btn-sm btn-success button-small" data-toggle="modal" data-target="#editModal" id="edit-button" value="{{$operator->id}}" > Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger button-small" id="delete_button" value="{{$operator->id}}"> Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>
      <input type="hidden" name="operator_id" value="" id="new_operator_id">
        @include('operator.modal')
        @include('operator.script')
    </div>
@endsection