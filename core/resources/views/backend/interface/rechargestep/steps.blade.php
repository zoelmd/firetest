@extends('backend.master')


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-meadow">
                        <i class="fa fa-th font-green-meadow"></i>
                        <span class="caption-subject bold uppercase" >Recharge Step</span>
                    </div>
                    <div class="actions">
                   <a href="{{route('admin.recharegeStep.create')}}">
                        <button type="button" class="btn btn-sm btn-info button-mediam"> Add New Step</button>
                    </a>
                  </div>
                </div>
                <div class="portlet-body">
                      <div class="portlet-body">
                    <table class="table" id="operator-table">
                        <thead>
                        <tr>
                            {{$i=1}}
                            <th>#</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Content</th>
                         
                             <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($steps as $step)
                            <tr>
                                <td style="padding-top: 25px; text-align: center;">{{$i++}}</td>
                                <td style="padding-top: 25px; text-align: center;">{{$step->name}}</td>
                                <td style="font-size: 25px; padding-top: 25px; text-align: center;"><i class="fa fa-{{$step->icon}}"></i></td>
                                <td style="width: 50%; text-align: justify;">{!!$step->content!!}</td>
                                <td style="padding-top: 25px; text-align: center;"> 
                                    
                                    @if($step->status==0)
                                         <input id="status_id" name="status_id" type="checkbox" data-value-id="{{$step->id}}" class="make-switch" data-on-color="success" data-off-color="danger" checked="">
                                    @else
                                         <input id="status_id" name="status_id" type="checkbox" data-value-id="{{$step->id}}" class="make-switch" data-on-color="success" data-off-color="danger">
                                    @endif
                                   
                                </td>
                                <td style="padding-top: 25px; text-align: center;">
                                        <a href="{{route('admin.recharegeStep.edit',$step->id)}}">  <button type="button" class="btn btn-sm btn-warning button-small"> <i class="fa fa-pencil-square-o"></i> Edit</button></a>
                                        
                                       <a href="{{route('admin.recharegeStep.delete',$step->id)}}">  <button type="submit" class="btn btn-sm btn-danger button-small"> <i class="fa fa-trash-o"></i> Delete</button></a>
                                   
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>  
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function() {
            $('.make-switch').on('switchChange.bootstrapSwitch', function () {
               var step_id = $(this).attr('data-value-id');
               
                    if ($(this).is(':checked')) {
                           status_id = 0;
                        }else{
                            status_id = 1;
                        }

            $.ajax({
                    
                    url: '{{route('admin.recharegeStep.status')}}',
                    type: 'GET',
                    data: {
                        status_id: status_id, 
                        step_id: step_id
                    },
                    
                    })
                    .done(function(data) {
                        console.log(data);
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                        });
                    
                    
                });
    </script>
@endsection