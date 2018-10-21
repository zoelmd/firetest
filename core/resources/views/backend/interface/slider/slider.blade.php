@extends('backend.master')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-blue"></i>
                        <span class="caption-subject font-green bold uppercase">Slider Settings</span>
                    </div>
                     <div class="actions">
                        <a class="btn btn-circle btn-lg btn-success" data-toggle="modal" data-target="#addslide">
                           <i class="icon-plus"></i> Add New Slider Image
                        </a>
                    </div>
                </div>    
                <div class="portlet-body">                   
                   <div class="row">
                       <div class="col-md-6"> <h3 style="margin-top:0;"> <b> Slider Text</h3></b></div>
                </div> 
                     <div id="textbody">
                       <div class="row" style="border: 1px solid black; padding: 5px;">
                       @php $t = App\SliderText::all()->first() @endphp
                         <div class="col-md-6">
                           <span style="display:block">First Line Text: </span>
                           <h4 style="display:inline-block; padding-right: 15px;"> {{$t->text_1}}</h4>  
                           <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_modal" id="text_1"><i class="fa fa-edit"></i> change</button >
                         </div>

                         <div class="col-md-6">
                           <span style="display:block">Second Line Text: </span>
                           <h4 style="display:inline-block; padding-right: 15px; "> {{$t->text_2}}</h4>  
                           <button class="btn btn-primary btn-sm" id="text_2" data-toggle="modal" data-target="#update_modal"><i class="fa fa-edit"></i> change</button></div>
                       </div>

                       </div>
                <div class="row">
                       <div class="col-md-6"> <h3> <b>Slider Image</h3></b></div>
                </div>     
                <div class="clearfix"></div>
                <div class="row" style="border: 1px solid black; padding: 15px 10px 0 0 ;">
                    @php $i = 1 @endphp
                     @php $q = 1 @endphp
                    @foreach($sliders as $slider)
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Slide {{$i++}}</div>
                              <div class="panel-body">
                                  <img src="{{ asset('assets/images/slider') }}/{{$slider->image}}" class="img-responsive" style=" margin: 0 auto;" width="680">
                              </div>
                               <div class="panel-footer">
                                    <a class="btn btn-circle btn-warning" data-toggle="modal" data-target="#editslide{{$slider->id}}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a class="btn btn-circle btn-danger"  href="{{ route('slider.destroy', $slider)}}" data-toggle="confirmation"  data-title="Are You Sure?" data-content="Delete This Slide?">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                              </div>
                            </div>
                        </div>

                        <!-- Edit Slide -->
                        <div id="editslide{{$slider->id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Slide {{$q++}}</h4>
                          </div>
                          <div class="modal-body">
                            <form role="form" method="POST" action="{{route('slider.update',$slider->id)}}" enctype="multipart/form-data">
                             {{ csrf_field() }}
                             {{method_field('put')}}
                                <div class="form-group">
                                    <span class="btn green fileinput-button">
                                                <i class="fa fa-plus"></i>
                                                <span> Upload Image </span>
                                                <input type="file" name="image" class="form-control input-lg"> 
                                            </span>
                                </div>
                                 <div class="form-group">
                                    <span class="btn-danger">Standard Image Size: 1440 x 750 px</span> 
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-success" style="width: 50%" >Update</button>
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
                            <!-- Add Slide -->
    <div id="addslide" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Slide</h4>
              </div>
              <div class="modal-body">
                <form role="form" method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <div class="form-group" style="margin: o auto;">
                        <span class="btn green fileinput-button">
                                                <i class="fa fa-plus"></i>
                                                <span> Upload Image </span>
                                                <input type="file" name="image" class="form-control input-lg"> 
                                            </span>
                                            
                    </div>
                     <div class="form-group">
                        <span class="btn-danger">Standard Image Size: 1440 x 750 px</span> 
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success" style="width: 50%" >Save</button>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
              </div>
            </div>

          </div>
        </div>

 
 <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                        <div class="modal-header">
                <b><h4 class="modal-title text-uppercase" id="exampleModalLabel"> <i class="fa fa-plus"></i></h4></b>
                </button>
            </div>
            <div class="modal-body">
                   <div  id="form-errors"></div>
                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">SliderText:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="slider_text" name="slider_text" placeholder="Country Name">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  id="save_text_btn" value="">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
     $(document).ready(function(){
      $(document).on('click', '#text_1', function() {
          $('#exampleModalLabel').text('Update Slider First Line Text');
          $('#save_text_btn').val(1);  
       });
       $(document).on('click', '#text_2', function() {
          $('#exampleModalLabel').text('Update Slider Second Line Text');
          $('#save_text_btn').val(2);

       });

        $(document).on('click', '#save_text_btn', function(event) {
            event.preventDefault();
            var id = $(this).val();
            var text = $('#slider_text').val();
            if(text==''){
               swal('Error','Input Field Empty!','error'); 
            }else{
                $.ajax({
                        type:"GET",
                        url:'{{route('slider.text.update')}}',
                        data : { id : id, text: text},
                        success: function (data) {
                             console.log(data);
                             $('#textbody').load(location.href + ' #textbody > *');
                             $('#update_modal').modal('hide');
                              $('#slider_text').val('');
                            swal('Success','Update Successfully','success');
                        },
                        error:function (error) {
                             var message = JSON.parse(error.responseText);
                             swal('Error',message.errors.text,'error');
                             console.log(message.errors.text);
                           
                        }
                    });
            }

     });
 });
          
</script>   
@endsection