@extends('backend.master')

@section('main-content')
    <div class="container">
        <div class="col-md-11">
         <div class="portlet light bordered">
              <div class="portlet-title">
                  <div class="caption">
                      <span class="caption-subject font-dark bold uppercase">All Country List</span>
                  </div>
                  <div class="actions">
                     <button type="button" class="btn btn-sm btn-info button-mediam" data-toggle="modal" data-target="#createModal"> Add New Country</button>
                  </div>
              </div>
              <div class="portlet-body">
                 <table class="table" id="country-table">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>DialCode</th>
                              <th>Symbol</th>
                              <th>CurrencyText</th>
                              <th>ExRate</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($countries as $country)
                            <tr>
                              <td>{{$country->id}}</td>
                              <td>{{$country->country_name}}</td>
                              <td>{{$country->dial_code}}</td>
                              <td>{!!$country->currency_symbol!!}</td>
                              <td>{{$country->currency_code}}</td>
                              <td>{{$country->exchange_rate}}</td>
                              <td><div class="btn-group" data-toggle="buttons">
                                  <button type="button" class="btn btn-sm btn-success button-small" data-toggle="modal" data-target="#editModal" id="edit-button" value="{{$country->id}}"> Edit</button>
                                  @if($country->status == 0)
                                      <button type="submit" class="btn btn-sm purple button-small"> Active</button>
                                  @else
                                      <button type="submit" class="btn btn-sm btn-danger button-small"> Deactive</button>
                                  @endif
                                  
                                  
                                  </div>
                              </td>
                            </tr>
                        @endforeach
                        </tbody>
                  </table>
              </div>
          </div>   
        @include('country.modal')
        @include('country.script')
    </div>
 </div>

@endsection