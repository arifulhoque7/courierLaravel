<style>
    canvas#signaturePad {
        background-color: #f7f8fa;
        border: 1px solid #ebedf2;
        width: 100%;
        display: block;
        border-radius: 5px;
        color: #000;
        margin-top:5px;
    }
    #signaturePadImg{
        display:none;
    }
</style>


@php
    $mission = \App\Mission::where('id', $mission->id)->first();
@endphp

@php
    // dd($mission);
    $shipment_details = \App\ShipmentMission::where('mission_id',$mission->id)->first();
    $shipments = \App\Shipment::where('id', $shipment_details->shipment_id)->first();
    $shipments_user_id = \App\UserClient::where('client_id', $shipments->client_id)->first();
    $shipments_user = \App\User::where('id', $shipments_user_id->user_id)->first();
    
// dd($shipments_user->phone);
    $payment_bank = \App\PaymentBank::where('client_id', $shipments->client_id)->first();
    $payment_bkash = \App\PaymentBkash::where('client_id', $shipments->client_id)->first();
    
    // dd($shipments->amount_to_be_collected);
    // dd($shipments->client_id);
    // dd($shipments->client_phone);
    // dd($shipments->client_id);
    // dd($payment_bkash->payment_bank);
    
    // client_id
    // amount
    //baank details
    // bank_name
    // branch_name
    // account_name
    // account_type
    // account_number
@endphp

<form id="kt_form_1" class="kt_form" action="{{route('admin.missions.action',['to'=>\App\Mission::DONE_STATUS])}}" method="POST">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title h6">{{translate('Confirm Amount')}}</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            @if ($mission->type == "Delivery" || $mission->type == "On-Hub" )
            <div class="col-md-12">
                @else
                <div class="col-md-6">
                    @endif
                <div class="form-group">
                    @if ($mission->type == "Delivery" || $mission->type == "On-Hub" )
                    <label>{{translate('Amount')}}({{currency_symbol()}}):</label>
                    @else
                    <label>{{translate('Amount Given to Marchant')}}({{currency_symbol()}}):</label>
                    @endif
                    <input type="hidden" class="form-control" value="{{$mission->id}}" name="checked_ids[]" />
                    {{-- @php
                    dd();
                    @endphp --}}
                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="number" class="form-control" value="{{$mission->amount}}" name="amount"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @else
                        <input type="number" class="form-control" value="{{$mission->amount}}" name="amount" disabled/>
                    @endif
                </div>
            </div>
            @if ($mission->type == "Supply")
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{translate('Delivary Charge')}}:</label>
                    {{-- <label>{{translate('Marchant Bkash Number')}}:</label> --}}

                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{$shipments->shipping_cost}}" name="user_name"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                </div>
            </div>
            @endif

           

        </div>
         @if ($mission->type == "Supply")
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label>{{translate('Amount Collected from Customer')}}({{currency_symbol()}}):</label>
                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{(int)$shipments->shipping_cost + (int)$shipments->amount_to_be_collected}}" name="cod"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                </div>
            </div>
            
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{translate('Marchant Name')}}:</label>
                    {{-- <label>{{translate('Marchant Bkash Number')}}:</label> --}}

                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{$shipments_user->name}}" name="user_name"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>{{translate('Marchant Phone')}}:</label>
                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{$shipments_user->phone}}" name="user_phone"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                </div>
            </div>

        </div>
        @if ($payment_bkash!= null)
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    @if ($payment_bkash!= null)
                    <label>{{translate('Marchant Bkash No')}}:</label>

                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{$payment_bkash->bkash_number}}" name="bkash_no"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                    @endif 
                </div>
            </div>
        </div>
        @endif
        @if ($payment_bank!= null)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    @if ($payment_bank!= null)
                    <label>{{translate('Marchant Bank Name')}}:</label>

                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{$payment_bank->bank_name}}" name="bank_name"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                    @endif 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    @if ($payment_bank!= null)
                    <label>{{translate('Bank Branch')}}:</label>

                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{$payment_bank->branch_name}}" name="branch_name"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                    @endif 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    @if ($payment_bank!= null)
                    <label>{{translate('Bank Account Name')}}:</label>

                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{$payment_bank->account_name}}" name="account_name"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                    @endif 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    @if ($payment_bank!= null)
                    <label>{{translate('Marchant Bank Account Type')}}:</label>

                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{$payment_bank->account_type}}" name="account_type"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                    @endif 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    @if ($payment_bank!= null)
                    <label>{{translate('Marchant Bank Account Number')}}:</label>

                    @if(in_array(Auth::user()->user_type,['admin']) || in_array('1030', json_decode(Auth::user()->staff->role->permissions ?? "[]")) )
                        <input type="text" class="form-control" value="{{$payment_bank->account_number}}" name="acount_number"
                        style="background:#f3f6f9;color:#3f4254;" disabled />
                    @endif
                    @endif 
                </div>
            </div>
        </div>
        @endif
@endif
        @if(\App\ShipmentSetting::getVal('def_shipment_conf_type') == 'seg' && $mission->getOriginal('type') ==  \App\Mission::DELIVERY_TYPE || $mission->getOriginal('type') ==  \App\Mission::SUPPLY_TYPE )
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{translate('Draw Signature')}}:</label>
                    <div class="signature_container">
                        <div class="btn-group" role="group" aria-label="First group">
                            <button type="button" class="btn btn-sm btn-primary" id="undo"><i class="la la-undo"></i> {{'Undo'}}</button>
                            <button type="button" class="btn btn-sm btn-warning" id="clear"><i class="la la-remove"></i> {{'Clear'}}</button>
                        </div>
                        <canvas id="signaturePad"></canvas>
                        <textarea type="hidden" id="signaturePadImg" name="signaturePadImg" class="kt-hide"></textarea>
                    </div>
                    <span class="form-text text-muted">{{'You can use your mouse to draw it, or if you using your mobile then you can use the touch screen to write it by your finger'}}</span>
                </div>
            </div>
        </div>
        @elseif(\App\ShipmentSetting::getVal('def_shipment_conf_type') == 'otp' && $mission->getOriginal('type') ==  \App\Mission::DELIVERY_TYPE || $mission->getOriginal('type') ==  \App\Mission::SUPPLY_TYPE)
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{translate('OTP')}}:</label>

                    <input type="text" name="otp_confirm" class="form-control" value="" name="otp" />
                </div>
            </div>

        </div>
        @endif
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{translate('Attachments After Shipping')}}:</label>

                    <div class="input-group " data-toggle="aizuploader" data-type="image" data-multiple="true">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
                        </div>
                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                        <input type="hidden" name="Shipment[attachments_after_shipping]" class="selected-files" value="" max="3">
                    </div>
                    <div class="file-preview">
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{translate('Close')}}</button>
        <button type="submit" id="confirm" class="btn btn-primary">{{translate('Confirm amount and Done')}}</button>
    </div>
</form>
<script>
    var canvas = document.querySelector("canvas");
    var signaturePad = new SignaturePad(canvas);

    document.getElementById('clear').addEventListener('click', function () {
            signaturePad.clear();
    });

    document.getElementById('undo').addEventListener('click', function () {
        var data = signaturePad.toData();
            if (data) {
            data.pop(); // remove the last dot or line
            signaturePad.fromData(data);
            }
    });


    $('body').on('click', '#confirm', function(e, clickedIndex, newValue, oldValue){
        e.preventDefault();
        var dataURL = canvas.toDataURL();
        var teet = signaturePad.toDataURL("data:image/png;base64,signature");
        $('#signaturePadImg').val(dataURL);
        $('.kt_form').submit();
    });

    $( document ).ready(function() {
        FormValidation.formValidation(
            document.getElementById('kt_form_1'), {
                fields: {
                    "otp_confirm": {
                        validators: {
                            notEmpty: {
                                message: '{{translate("This is required!")}}'
                            }
                        }
                    },
                    "amount": {
                        validators: {
                            notEmpty: {
                                message: '{{translate("This is required!")}}'
                            }
                        }
                    }

                },

                plugins: {
                    autoFocus: new FormValidation.plugins.AutoFocus(),
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // Submit the form when all fields are valid
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    icon: new FormValidation.plugins.Icon({
                        valid: '',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh',
                    }),
                }
            }
        );
    });
</script>
