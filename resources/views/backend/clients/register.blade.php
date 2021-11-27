@extends('backend.layouts.blank')

@section('content')

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
        style="background-image: url('{{ static_asset('assets/dashboard/media/bg/bg-3.jpg') }}');">


        <div class="container p-5">
            <div class="row">
                <div class="mx-auto col-lg-8 col-xl-8">
                    <!--begin::Login Header-->
                    <div class="mb-5 d-flex flex-center">
                        <a href="#">
                            @if (get_setting('system_logo_black') != null)
                            <img src="{{ uploaded_asset(get_setting('system_logo_black')) }}"
                            alt="{{ get_setting('site_name') }}" class="max-h-75px" style="width:100%">
                            @else
                            <img src="{{ static_asset('assets/img/Akash Parcel@300x.png') }}"
                            alt="{{ get_setting('site_name') }}" class="max-h-50px">
                            @endif
                        </a>
                    </div>
                    <!--end::Login Header-->
                    <div class="mb-3 text-center">
                        <div class="font-weight-bold">{{ translate('Create a New Account') }}</div>
                    </div>
                    <div class="text-left card">
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="POST" action="{{ route('client.save') }}">
                                @csrf

                                <div class="mb-3">
                                    <h6 class="">Personal Information:</h6>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autofocus
                                            placeholder="{{ translate('Full Name') }}">

                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="{{ translate('Email') }}">

                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="{{ translate('password') }}">

                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="password-confirm" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation"
                                            placeholder="{{ translate('Confrim Password') }}">
                                            @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="img" class="custom-file-input @error('img') is-invalid @enderror"
                                                    id="inputGroupFile02">
                                                    <label class="custom-file-label" for="inputGroupFile02"
                                                    aria-describedby="inputGroupFileAddon02">Choose file</label>
                                                </div>
                                            </div>

                                            @if ($errors->has('img'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('img') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="mobile" type="text"
                                            class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                            value="{{ old('mobile') }}"
                                            placeholder="{{ translate('Phone Number') }}">

                                            @if ($errors->has('mobile'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="responsible_name" type="text"
                                            class="form-control @error('responsible_name') is-invalid @enderror"
                                            name="responsible_name" value="{{ old('responsible_name') }}"
                                            placeholder="{{ translate('Responsible Name (Optional)') }}">

                                            @if ($errors->has('responsible_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('responsible_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="responsible_mobile" type="text"
                                            class="form-control @error('responsible_mobile') is-invalid @enderror"
                                            name="responsible_mobile" value="{{ old('responsible_mobile') }}"
                                            placeholder="{{ translate('Responsible Mobile (Optional)') }}">

                                            @if ($errors->has('responsible_mobile'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('responsible_mobile') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="follow_up_name" type="text"
                                            class="form-control @error('follow_up_name') is-invalid @enderror"
                                            name="follow_up_name" value="{{ old('follow_up_name') }}"
                                            placeholder="{{ translate('Follow Up Name (Optional)') }}">

                                            @if ($errors->has('follow_up_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('follow_up_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="follow_up_mobile" type="text"
                                            class="form-control @error('follow_up_mobile') is-invalid @enderror"
                                            name="follow_up_mobile" value="{{ old('follow_up_mobile') }}"
                                            placeholder="{{ translate('Follow Up Mobile (Optional)') }}">

                                            @if ($errors->has('follow_up_mobile'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('follow_up_mobile') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="national_id" type="text"
                                            class="form-control @error('national_id') is-invalid @enderror"
                                            name="national_id" value="{{ old('national_id') }}"
                                            placeholder="{{ translate('National Id') }}">

                                            @if ($errors->has('national_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('national_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" placeholder="{{ translate('Address') }}">

                                            @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <h6 class="">Payment Information:</h6>
                                </div>

                                <div class="text-center mb-5">
                                    <label><input type="radio" name="colorRadio" value="bank" checked> Bank Account</label>
                                    <label><input type="radio" name="colorRadio" value="bkash"> Bkash</label>
                                </div>


                                <div class="bank box">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input id="bank_name" type="text"
                                                class="form-control @error('bank_name') is-invalid @enderror"
                                                name="bank_name" value="{{ old('bank_name') }}"
                                                placeholder="{{ translate('Bank Name') }}">

                                                @if ($errors->has('bank_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bank_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input id="branch_name" type="text"
                                                class="form-control @error('branch_name') is-invalid @enderror" name="branch_name"
                                                value="{{ old('branch_name') }}" placeholder="{{ translate('Branch Name') }}">

                                                @if ($errors->has('branch_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('branch_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input id="account_name" type="text"
                                                class="form-control @error('account_name') is-invalid @enderror"
                                                name="account_name" value="{{ old('account_name') }}"
                                                placeholder="{{ translate('Account Owner Name') }}">

                                                @if ($errors->has('account_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('account_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input id="account_type" type="text"
                                                class="form-control @error('account_type') is-invalid @enderror" name="account_type"
                                                value="{{ old('account_type') }}" placeholder="{{ translate('Account Type') }}">

                                                @if ($errors->has('account_type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('account_type') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input id="account_number" type="text"
                                                class="form-control @error('account_number') is-invalid @enderror"
                                                name="account_number" value="{{ old('account_number') }}"
                                                placeholder="{{ translate('Account Number') }}">

                                                @if ($errors->has('account_number'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('account_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bkash box">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input id="bkash_number" type="text"
                                                class="form-control @error('bkash_number') is-invalid @enderror"
                                                name="bkash_number" value="{{ old('bkash_number') }}"
                                                placeholder="{{ translate('Bkash Number') }}">

                                                @if ($errors->has('bkash_number'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bkash_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-5 text-left checkbox pad-btm">
                                    <label class="checkbox checkbox-success">
                                        <input id="condotion_agreement" name="condotion_agreement" type="checkbox"
                                        class="sh-check @error('condotion_agreement') is-invalid @enderror" />
                                        <span class="mr-3"></span>
                                        {{ translate('I agree with the Terms and Conditions') }}
                                    </label>
                                    
                                </div>
                                <div>
                                    @if ($errors->has('condotion_agreement'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('condotion_agreement') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <br>

                                <button type="submit" class="btn btn-primary btn-lg btn-block ">
                                    {{ translate('Register') }}
                                </button>
                            </form>

                            <div class="mt-3">
                                {{ translate('Already have an account') }} ? <a href="{{ route('login') }}"
                                class="btn-link mar-rgt text-bold">{{ translate('Sign In') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end::Login-->
</div>
<!--end::Main-->



@endsection


@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        const form = document.getElementById('kt_login');
        FormValidation.formValidation(
            form, {
                fields: {
                    "name": {
                        validators: {
                            notEmpty: {
                                message: '{{ translate('This is required!') }}'
                            }
                        }
                    },
                    "password": {
                        validators: {
                            notEmpty: {
                                message: '{{ translate('This is required!') }}'
                            }
                        }
                    },
                    "password_confirmation": {
                        validators: {
                            notEmpty: {
                                message: '{{ translate('This is required!') }}'
                            },
                            identical: {
                                compare: function() {
                                    return document.getElementById('kt_login').querySelector(
                                        '[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    "email": {
                        validators: {
                            notEmpty: {
                                message: '{{ translate('This is required!') }}'
                            },
                            emailAddress: {
                                message: '{{ translate('This is should be valid email!') }}'
                            },
                            remote: {
                                data: {
                                    type: 'email',
                                },
                                message: 'The email is already exist',
                                method: 'GET',
                                url: '{{ route('user.checkEmail') }}',
                            }
                        }
                    },
                    "demo-form-checkbox": {
                        validators: {
                            notEmpty: {
                                message: '{{ translate('This is required!') }}'
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
                            valid: 'fa fa-check',
                            invalid: 'fa fa-times',
                            validating: 'fa fa-refresh',
                        }),
                    }
                }
                );
    });

    $(document).ready(function(){
        $(".bank").slideDown("slow");
        $(".bkash").hide();
        $('input[type="radio"]').click(function(){
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).slideToggle("slow");
        });
    });
</script>


@endsection
