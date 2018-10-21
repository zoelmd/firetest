@extends('backend.master')
@section('main-content')
    <div class="row">
    <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <table class="table table-striped table-bordered nowrap" id="table_contact">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($feedback_contacts as $feedback_contact)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$feedback_contact->name}}</td>
                                <td>{{$feedback_contact->email}}</td>
                                <td>{{$feedback_contact->message}}</td>
                                <td><button id="delete" class="btn btn-danger" value="{{$feedback_contact->id}}">Delete</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    </div>
 <script>
     $(document).ready(function(){
          $('#table_contact').dataTable();
        $(document).on('click', '#delete', function(event) {
            event.preventDefault();
            var id = $(this).val();
            if(id==''){
               swal('Error','Something Wrong!','error'); 
            }else{
                $.ajax({
                        type:"GET",
                        url:'{{route('subscriber.delete')}}',
                        data : { id : id},
                        success: function (data) {
                             $('#table_contact').load(location.href + ' #table_contact > *');
                            swal('Success','Deleted Successfully','success');
                        },
                        error:function (error) {
                             swal('Error','Something Wrong!','error'); 
                             console.log(error);
                           
                        }
                    });
            }

     });
 });
          
</script>   
@endsection