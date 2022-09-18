@extends('layout.user-layout')

@section('content')

<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Account Setting</title>

    <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>
</head>

<body style="margin: 0 0 100px;">
    <input type="hidden" id = "current_resident" data-id = {{ session("resident.id") }}>

   

    <div style="margin-bottom: 227px;">
        <h2 class="m-3 mt-5 text-center">Profiling</h2>

        <form id="resident_accountsetting_form" class="p-4">
            {{ csrf_field() }}
            <input type="hidden" name="resident_id" id="resident_id" value="{{ session("resident.id") }}">
            <input type="hidden" name="resident_email" id="resident_email" value="{{ session("resident.email") }}">
            <div class="rounded shadow-lg border border-secondary p-4" style="font-size: 20px">

                <div class="alert alert-success" id="success_msg">
                  
                </div>


                {{-- Basic info --}}
                <h2 style="color: rgb(3, 50, 112); ">Personal Information</h2><hr>
                {{-- 1st row --}}
                <div class="form-row p-3">
                    <div class="form-group col-md-6">
                        <label for="resident_accountsetting_firstname">First Name</label>
                        <input type="text" class="form-control" id="resident_accountsetting_firstname" name="resident_accountsetting_firstname" placeholder="N/A" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="resident_accountsetting_lastname">Last Name</label>
                        <input type="text" class="form-control" id="resident_accountsetting_lastname" name="resident_accountsetting_lastname" placeholder="N/A" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="resident_accountsetting_middlename">Midlle Name</label>
                        <input type="text" class="form-control" id="resident_accountsetting_middlename" name="resident_accountsetting_middlename" placeholder="N/A">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="resident_accountsetting_alias">Alias</label>
                        <input type="text" class="form-control" id="resident_accountsetting_alias" name="resident_accountsetting_alias" placeholder="N/A">
                    </div>
                </div>

                {{-- 2nd row --}}
                <div class="form-row p-3">

                    <div class="form-group col-md-5">
                        <label for="resident_accountsetting_birthday">Birthday</label>
                        <input type="date" id="resident_accountsetting_birthday" name="resident_accountsetting_birthday"  class="form-control ">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="resident_accountsetting_birthplace">Place of Birth</label>
                        <input type="text" id="resident_accountsetting_birthplace" name="resident_accountsetting_birthplace"  class="form-control " placeholder="Ex: Buluang, Baao">
                    </div>

                    <div class="form-group col-md-2 pl-2">
                        <label class="row pl-2" for="resident_accountsetting_age">Age </label>
                        <input type="text" id="resident_accountsetting_age" name="resident_accountsetting_age"  class="form-control " placeholder="Ex: 18">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="resident_accountsetting_gender">Gender</label>
                        <select class="form-control" id="resident_accountsetting_gender" name="resident_accountsetting_gender">
                            <option value="">-Select Gender-</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="resident_accountsetting_height">Height</label>
                        <input type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="resident_accountsetting_height" id="resident_accountsetting_height" placeholder="N/A" value="0">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="resident_accountsetting_weight">Weight</label>
                        <input type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="resident_accountsetting_weight" id="resident_accountsetting_weight" placeholder="N/A" value="0">
                    </div>
                </div>

                {{-- 3rd row --}}
                <div class="form-row p-3">
                    <div class="col-md-4  form-group" >
                        <label for="resident_accountsetting_voterstatus">Voter Status</label>
                        <select class="form-control" id="resident_accountsetting_voterstatus" name="resident_accountsetting_voterstatus">
                            <option value="">-Select Voter Status-</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-md-4 item form-group">
                        <label for="resident_accountsetting_civilstatus">Civil Status</label>
                        <select class="form-control" name="resident_accountsetting_civilstatus" id="resident_accountsetting_civilstatus">
                            <option value="">-Select Marital Status-</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                            <option value="Divorced">Divorced</option>
                        </select>

                    </div>

                    <div class="col-md-4 form-group">
                        <label for="resident_accountsetting_citizenship">Citizenship</label>
                        <input type="text" id="resident_accountsetting_citizenship" name="resident_accountsetting_citizenship" placeholder="Ex: Filipino"   class="form-control ">
                    </div>
                </div>

                {{-- 4th row --}}
                <div class="form-row p-3" >
                    <div class="col-sm-6 form-group" >
                        <label for="resident_accountsetting_telephone">Telephone Number</label>
                        <input type="text" class="form-control"   name="resident_accountsetting_telephone" id="resident_accountsetting_telephone" placeholder="Ex: 123-45-678" maxlength="8">
                        <span class="text-danger error_text resident_accountsetting_telephone_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="resident_accountsetting_mobile">Mobile Number</label>
                        <input type="text" class="form-control" name="resident_accountsetting_mobile" id="resident_accountsetting_mobile"  placeholder="Ex: 0912345678" value="" maxlength="11">
                        <span class="text-danger error_text resident_accountsetting_mobile_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-sm-12 form-group">
                        <label for="resident_accountsetting_address_1">Address</label>
                        <textarea id="resident_accountsetting_address_1" name="resident_accountsetting_address_1" placeholder="Ex: Buluang, Baao Camarines Sur"  class="form-control " rows="2" style="resize: none;"></textarea>
                    </div>

                    
                </div>

            </div>

            <div class="rounded shadow-lg border border-secondary p-4 mt-5" style="font-size: 20px">
                {{-- Parents/Guardians/Spouse --}}
                <h2 style="color: rgb(3, 50, 112)">Parents/Spouse</h2><hr>

                {{-- 1st row --}}
                <div class="form-row p-3">
                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_father">Father's Name</label>
                        <input type="text" class="form-control" name="resident_accountsetting_father" id="resident_accountsetting_father" placeholder="N/A">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_mother">Mother's Name</label>
                        <input type="text" class="form-control" name="resident_accountsetting_mother" id="resident_accountsetting_mother" placeholder="N/A">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_spouse">Spouse</label>
                        <input type="text" class="form-control" name="resident_accountsetting_spouse" id="resident_accountsetting_spouse" placeholder="N/A">
                    </div>

                </div>
            </div>

            <div class="rounded shadow-lg border border-secondary p-4 mt-5" style="font-size: 20px">
                {{-- Social Welfare Services --}}
                <h2 style="color: rgb(3, 50, 112)">Social Welfare Services</h2><hr>

                <div class="form-row p-3">
                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_PAG_IBIG">PAG-IBIG</label>
                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)"  name="resident_accountsetting_PAG_IBIG" id="resident_accountsetting_PAG_IBIG" placeholder="N/A" maxlength = "14" value="">
                        <span class="text-danger error_text resident_accountsetting_PAG_IBIG_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_PHILHEALTH">PHILHEALTH</label>
                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="resident_accountsetting_PHILHEALTH" id="resident_accountsetting_PHILHEALTH" placeholder="N/A" maxlength = "14" value="">
                        <span class="text-danger error_text resident_accountsetting_PHILHEALTH_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_SSS">SSS</label>
                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="resident_accountsetting_SSS" id="resident_accountsetting_SSS" placeholder="N/A"  maxlength = "10" value="">
                        <span class="text-danger error_text resident_accountsetting_SSS_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_TIN">TIN</label>
                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="resident_accountsetting_TIN" id="resident_accountsetting_TIN" placeholder="N/A" maxlength = "12" value="">
                        <span class="text-danger error_text resident_accountsetting_TIN_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                </div>
            </div>

            <div class="rounded shadow-lg border border-secondary p-4 mt-5" style="font-size: 20px">
                {{-- Account --}}
                <h2 style="color: rgb(3, 50, 112)">Account</h2><hr>

                <div class="form-row p-3">
                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_username">Username</label>
                        <input type="text" id="resident_accountsetting_username" name="resident_accountsetting_username" value="" placeholder="Enter username" class="form-control ">
                        <span class="text-danger error_text resident_accountsetting_username_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_email">Email</label>
                        <input type="email" id="resident_accountsetting_email" name="resident_accountsetting_email"  placeholder="Ex: mery@gmail.com" class="form-control ">
                        <span class="text-danger error_text resident_accountsetting_email_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_newpassword">New password</label>
                        <input type="password" id="resident_accountsetting_newpassword" name="resident_accountsetting_newpassword"  placeholder="Enter new password" class="form-control " minlength="8">
                        <span class="text-danger error_text resident_accountsetting_newpassword_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_newpassword_confirmation">Confirm new password</label>
                        <input type="password" id="resident_accountsetting_newpassword_confirmation" name="resident_accountsetting_newpassword_confirmation"  placeholder="Confirm your password" class="form-control " disabled>
                        <span class="text-danger error_text resident_accountsetting_newpassword_confirmation_error" style="text-align:left;font-size:18px;" ></span>
                    </div>
                </div>
            </div>

            {{-- confirmation --}}
            <div class="rounded shadow-lg border border-secondary p-4 mt-5" style="font-size: 30px">
                <div class="form-row  justify-content-around">
                    <h2 style="color: rgb(3, 50, 112)" class="col-12">Confirmation</h2><hr>
                    <input type="password" class="form-control col-8" id="resident_accountsetting_password" name="resident_accountsetting_password" placeholder="Enter old password to save changes">
                    <input type="submit" class="btn btn-success col-2" id="resident_accountsetting_submit" name="resident_accountsetting_submit" value="SAVE CHANGES">
                </div>
                <div class="form-row  justify-content-around">
                    <span class="text-danger error_text resident_accountsetting_password_error col-8" style="text-align:left;font-size:18px;" ></span>
                    <div class="col-2"></div>
                </div>

            </div>

        </form>
        {{-- end of form --}}
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script type="text/javascript" src=" {{ URL::asset('js/app.js') }}"></script>

<!---datatable-->


<script type="text/javascript" src=" https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>



<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>

<!--pagination-->
<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/pagination.min.js') }}"></script>
</html>


@endsection