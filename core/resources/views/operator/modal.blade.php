<!--Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel"> <i class="fa fa-plus"></i> Add Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <form action="{{route('operator.create')}}" method="POST" enctype="multipart/form-data" novalidate="">
                <div class="modal-body">
                    {{ csrf_field() }}
                     <div id="form-errors-show"></div>
                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Contry Name:</label>
                        <div class="col-sm-9">
                           <select class="form-control selectpicker" data-live-search="true" id="country_id" name="country_id">
                                    <option value="0" >Select Country Name</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" data-tokens="{{$country->country_name}}">{{$country->country_name}}</option>
                                @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Operator Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="operator_name" name="operator_name" placeholder="Operator Name">
                            <small class="form-text text-danger" id="operator_name_error"></small>
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Operator Code:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="operator_code" name="operator_code" placeholder="Operator Code">
                            <small class="form-text text-danger" id="operator_code_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Operator Logo:</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control form-control-sm" id="operator_logo" name="operator_logo" placeholder="Operator Logo">
                            <small class="form-text text-danger" id="operator_logo_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 padding-zero" style="padding: 0">
                            <label for="smFormGroupInput" class="col-sm-12 padding-zero col-form-label col-form-label-sm">Recharge Limite:</label>
                        </div>
                        <div class="col-md-4" style="padding: 0">
                            <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Mim:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="min_recharge" name="min_recharge" placeholder="Exchange Rate">
                            <small class="form-text text-danger" id="min_recharge_error"></small>
                        </div>
                        </div>
                        <div class="col-md-4" style="padding: 0">
                            <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Max:</label>
                        <div class="col-sm-9" style="padding-right: 0">
                            <input type="text" class="form-control form-control-sm" id="max_recharge" name="max_recharge" placeholder="Exchange Rate">
                            <small class="form-text text-danger" id="max_recharge_error"></small>
                        </div>
                        </div>
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save Operator">
                </div>
            </form>
        </div>
    </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel"> <i class="fa fa-plus"></i> Add Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <form action="{{route('operator.update')}}" method="POST" id="edit_upload_form" enctype="multipart/form-data">
                <div class="modal-body">

                    {{ csrf_field() }}
                     <div id="form-errors-show-edit"></div>
                     <input type="hidden" name="edit_operator_id" id="edit_operator_id">
                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Contry Name:</label>
                        <div class="col-sm-9">
                           <select class="form-control selectpicker" data-live-search="true" id="edit_country_id" name="edit_country_id">
                                    <option value="0" >Select Country Name</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" data-tokens="{{$country->country_name}}">{{$country->country_name}}</option>
                                @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Operator Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="edit_operator_name" name="edit_operator_name" placeholder="Operator Name">
                            <small class="form-text text-danger" id="edit_operator_name_error"></small>
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Operator Code:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="edit_operator_code" name="edit_operator_code" placeholder="Operator Code">
                            <small class="form-text text-danger" id="operator_code_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Operator Logo:</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control form-control-sm" id="edit_operator_logo" name="edit_operator_logo" placeholder="Operator Logo">
                            <small class="form-text text-danger" id="edit_operator_logo_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 padding-zero" style="padding: 0">
                            <label for="smFormGroupInput" class="col-sm-12 padding-zero col-form-label col-form-label-sm">Recharge Limite:</label>
                        </div>
                        <div class="col-md-4" style="padding: 0">
                            <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Mim:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="edit_min_recharge" name="edit_min_recharge" placeholder="Exchange Rate">
                            <small class="form-text text-danger" id="edit_min_recharge_error"></small>
                        </div>
                        </div>
                        <div class="col-md-4" style="padding: 0">
                            <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Max:</label>
                        <div class="col-sm-9" style="padding-right: 0">
                            <input type="text" class="form-control form-control-sm" id="edit_max_recharge" name="edit_max_recharge" placeholder="Exchange Rate">
                            <small class="form-text text-danger" id="max_recharge_error"></small>
                        </div>
                        </div>
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"  id="update_btn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
