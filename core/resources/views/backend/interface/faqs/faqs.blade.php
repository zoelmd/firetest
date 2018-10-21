@extends('backend.master')

@section('main-content')


</style>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green-meadow">
                        <i class="fa fa-question font-green-meadow"></i>
                        <span class="caption-subject bold uppercase" >FAQ</span>
                    </div>

                    <div class="actions">
                       
                        <button id="btn_faq_add" class="btn btn-circle btn-lg green-meadow uppercase bold"> <i class="fa fa-plus-square"></i> Add FAQ </button> 

                        <button class="btn btn-circle btn-lg green uppercase bold" data-toggle="modal" data-target="#faq_modal_two"> <i class="fa fa-plus-square"></i> Add Vedio Link </button>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover" id="table_faqs">
                            <thead>
                                <tr>
                                    <th class="col-md-7"> Question </th>
                                    <th class="col-md-2"> Status </th>
                                    <th class="col-md-3"> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($faqs as $faq)
                                    <tr>
                                        <td class="highlight">
                                            <dl>
                                                <dt>{{ $faq->title }}</dt>
                                                <br>
                                                <dd>{{ $faq->description }}</dd>
                                            </dl>
                                        </td>
                                        <td style="text-align: center;" data-status="{{$faq->status}}">
                                        @if($faq->status==0)
                                            <span class='label label-info'> <i class='fa fa-check'></i> Active </span>
                                        @else
                                            <span class='label label-danger'> <i class='fa fa-times'></i>  Inactive </span>
                                        @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <button id="btn_edit_faq" class="btn btn-circle btn-sm green-meadow" value="{{ $faq->id }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>

                                            <button id="btn_delete_faq" class="btn btn-circle btn-sm red-sunglo" data-title="" data-content="Are you sure to delete?" data-toggle="confirmation">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </button>
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

    <div class="modal fade" id="faq_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title bold uppercase" id="faq_modal_label">Add Question</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="faq_title" class="control-label bold uppercase">Question Title : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-question"></i></span>
                            <input type="text" class="form-control has-error bold " id="faq_title" name="title" placeholder="Question Title" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="faq_description" class="control-label bold uppercase">Answer : </label>
                        <textarea id="faq_description" class="form-control" name="description" rows="5">Answer</textarea>
                    </div>

                    <div class="form-group" id="faq_container">
                        <label for="status"><strong class="bold uppercase">Status:</strong></label><br>
                        <input id="status" name="status" type="checkbox" class="make-switch"  data-on-color="success" data-off-color="danger">
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn green-meadow bold uppercase" id="btn_faq_save" value="add"><i class="fa fa-send"></i> Save FAQ</button>
                    <input type="hidden" id="faq_id" name="faq_id" value="1">
                </div>
            </div>
        </div>
    </div>
 <!--FAQ Vedio Link -->
        <div class="modal fade" id="faq_modal_two" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title bold uppercase" id="faq_modal_label">Add FAQ Vedio Link</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="faq-vedio">
                       <iframe width="570" height="255" src="{{$general_settings->vedio_link}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="faq_title" class="control-label bold uppercase">FAQ Vedio Link : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                            <input type="text" class="form-control has-error bold " id="faq_vedio_link" name="faq_vedio_link" placeholder="Youtube Vedio Link" value="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn green-meadow bold uppercase" id="btn_vedio_faq_update" value="add"><i class="fa fa-send"></i> Save FAQ</button>
                    <input type="hidden" id="faq_id" name="faq_id" value="1">
                </div>
            </div>
        </div>
    </div>

    <meta name="_token" content="{!! csrf_token() !!}" />
   

@endsection
@section('scripts')
    <script src="{{url('/')}}/assets/backend/global/plugins/confirmation/bootstrap-confirmation.js" type="text/javascript"></script>
{{--    <script src="{{ asset('assets/backend/global/plugins/nice-edit/nice-edit.js') }}" type="text/javascript"></script>--}}
    {{--<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>--}}

    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('alert'))
                swal("Sorry!", "{!! session('alert') !!}", "error");
            @endif

            //Add category
            $("#btn_faq_add").on('click', function () {
                $("#faq_modal_label").text("Add Question");
                $("#faq_title").val("");
                $("#faq_description").val("")
                $("#btn_faq_save").val("");

                $("#faq_modal .form-group").each(function () {
                    if ($(this).hasClass("has-error")) {
                        $(this).removeClass("has-error");
                    }
                });

                $("#faq_modal").modal('show');
            });

            // creates or updates category
            $("#btn_faq_save").on('click', function () {
                var faqTitle = $("#faq_title").val();
                var faqDescription = $("#faq_description").val();
                var faqStatus = '0';
                if ($('#status').is(":checked")){
                    faqStatus = '1';
                }

                var url  = '{{ url('admin/faqs') }}';
                var type = 'post';

                if ($(this).val() === 'update') {
                    url  = '{{ url('admin/faqs/').'/' }}' + $("#faq_id").val();
                    type = 'put';
                }
                console.log(url);
                $.ajax({
                    type: type,
                     url: url,
                dataType: 'json',

                    data: {
                        'title' : faqTitle,
                        'description' : faqDescription,
                        'status' : faqStatus,
                        '_token': $('meta[name="_token"]').attr('content')
                    },

                    success: function (result) {
                        $('#table_faqs').load(location.href + ' #table_faqs > *');
                        $("#faq_modal").modal('hide');
                        swal({
                            title: "Success!",
                             text: "Done!",
                             type: "success"
                        });
                    },

                    error: function (error) {
                        var message = JSON.parse(error.responseText);
                        console.log(message);

                        if (message.errors.title) {
                            $("#faq_title").closest('.form-group').addClass("has-error");
                        }

                        if (message.errors.description) {
                            $("#faq_description").closest(".form-group").addClass("has-error");
                        }
                    }

                });
            });

            $(document).on("click", "#btn_edit_faq", function () {
                //setting value to determine whether update needed
                $("#faq_id").val($(this).val());
                $("#btn_faq_save").val("update");
                $("#faq_modal_label").text("Edit FAQ");
                $("#faq_title").val($(this).parent().siblings().first().find("dt").text());
                $("#faq_description").val($(this).parent().siblings().first().find("dd").text());

                var faqStatus = $(this).parent().prev().attr("data-status");
                if (faqStatus === '0') {
                    $("#faq_container").html("");
                    $("#faq_container").append('<input checked id="status" name="status" type="checkbox" class="make-switch"  data-on-color="success" data-off-color="danger">');
                    $("#status").bootstrapSwitch();
                } else {
                    $("#faq_container").html("");
                    $("#faq_container").append('<input id="status" name="status" type="checkbox" class="make-switch"  data-on-color="success" data-off-color="danger">');
                    $("#status").bootstrapSwitch();
                }

                $("#faq_modal").modal('show');
            });


            $(document).on("click", "#btn_delete_faq", function () {
                //setting value to determine whether update needed
                $("#faq_id").val($(this).val());
                $("#btn_faq_save").val("update");

            });

             $(document).on("click", "#btn_vedio_faq_update", function () {
                var vedio_link = $('#faq_vedio_link').val();
                
                if(vedio_link==''){
                     swal("Error", "Empty Field!", "warning");
                }else{
                    $.ajax({
                    url: '{{route('admin.faq.vedio.link.update')}}',
                    type: 'GET',
                    data: {vedio_link: vedio_link},
                    })
                    .done(function(data) {
                         $('#faq_modal_two').modal('toggle');
                        //$('#faq_modal').modal('hide');
                        swal("Update", "Vedio URL Update Successfully!", "success");
                        $('#faq_vedio_link').val('');
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    }); 
                }
               
                

            });
        });
    </script>

@endsection