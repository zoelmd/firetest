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
            <div id="#someDivToDisplayErrors"></div>
             <form action="{{route('country.create')}}" method="POST">
            <div class="modal-body">
                   
                          {{ csrf_field() }}
                   <div  id="form-errors"></div>
                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-4 col-form-label col-form-label-sm">Contry Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="country_name" name="country_name" placeholder="Country Name">
                            <small class="form-text text-danger" id="country_name_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-4 col-form-label col-form-label-sm">Country Name Code:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="country_code" name="country_code" placeholder="Country Name Code">
                            <small class="form-text text-danger" id="country_code_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-4 col-form-label col-form-label-sm">Dial Code:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="dial_code" name="dial_code" placeholder="Country Dial Code">
                            <small class="form-text text-danger" id="dial_code_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-4 col-form-label col-form-label-sm">Currency Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="currency_name" name="currency_name" placeholder="Currency Name">
                            <small class="form-text text-danger" id="currency_name_error"></small>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-4 col-form-label col-form-label-sm">Currency Code Text:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="currency_text" name="currency_text" placeholder="Currency Text">
                            <small class="form-text text-danger" id="currency_text_error"></small>
                        </div>
                    </div>

                     <div class="form-group row">
                            <label for="smFormGroupInput" class="col-sm-4 col-form-label col-form-label-sm">Exchange Rate:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="exchange_rate" name="exchange_rate" placeholder="Exchange Rate">
                                <small class="form-text text-danger" id="exchange_rate_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="smFormGroupInput" class="col-sm-4 col-form-label col-form-label-sm">Status:</label>
                            <div class="col-sm-8">
                                <input id="status_id" name="status_id" type="checkbox" class="make-switch" data-on-color="success" data-off-color="danger">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  id="save_btn">Save changes</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                          {{ csrf_field() }}
                   
                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Contry Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="edit_country_name" name="country_name" placeholder="Country Name" readonly="">
                            <small class="form-text text-danger" id="country_name_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Dial Code:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="edit_dial_code" name="dial_code" placeholder="Country Dial Code" readonly="">
                            <small class="form-text text-danger" id="dial_code_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Currency Text:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" id="edit_currency_text" name="currency_text" placeholder="Currency Text">
                            <small class="form-text text-danger" id="edit_currency_text_error" ></small>
                        </div>
                    </div>

                     <div class="form-group row">
                            <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Exchange Rate:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="edit_exchange_rate" name="exchange_rate" placeholder="Exchange Rate">
                                <small class="form-text text-danger" id="edit_exchange_rate_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                            <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-sm">Status:</label>
                            <div class="col-sm-9">
                                <input id="status_id" name="status_id" type="checkbox" class="make-switch" data-on-color="success" data-off-color="danger">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit-editm-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
