@extends('layouts.simple')
@section('title', 'Ubah Kata Sandi')
@section('js_before')
    <script src="{{ asset('/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>    
    <script>jQuery(function(){ Dashmix.helpers(['maxlength']); });</script>
@endsection

@section('content')
<section class="profile">
    @if(\Session::has('alert-success'))
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <p class="mb-0">{{Session::get('alert-success')}}</p>
        </div>
    @endif

    @if(\Session::has('alert-danger'))
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <p class="mb-0">{{Session::get('alert-danger')}}</p>
        </div>
    @endif
    <div class="content">
        <!-- Simple -->
        <h4 style="color: #707070; !important;">PENGATURAN PENGGUNA : CHANGE PASSWORD</h4>
        <div class="block block-rounded block-bordered text-center">
            <div class="block-content">
            <form action="/auth/reset-password" method="post" id="login-form">
                @method('put')
                @csrf    
                <div class="form-group">
                    <input type="password" class="form-control" 
                    id="password" 
                    name="password" 
                    placeholder="Password"
                    required />
                </div>
                <div class="form-group">
                    <input type="password" 
                    class="form-control" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="Confirm Password"
                    required />
                    <div id="pass-error" class="row d-none">
                        <div class="col-12">
                            <label class="col-sm-12 col-form-label text-danger">Password and confirm password must match!</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p class="font-w700 font-size-sm text-muted">* Password terdiri dari huruf besar , huruf kecil & angka  </p>
                    <button type="submit" class="btn btn-hero-primary btn-block">Submit</button>

                    <!-- <button type="submit" id="submitter" class="d-none"></button> -->
                    <!-- <button type="submit" onclick="validate();" class="btn btn-hero-primary btn-block">Submit</button> -->
                </div>
            </form>
            </div>
        </div>   
    </div>

    <script type="text/javascript">

        //on keypress
        $('#uma-create-password').keyup(function(e){
            var password         = $('#uma-create-password').val();
            var lowerCaseLetters = /[a-z]/g;
            var upperCaseLetters = /[A-Z]/g;
            var numbers          = /[0-9]/g;
            if(password.match(lowerCaseLetters) && password.length >= 8 && password.match(upperCaseLetters) && password.match(numbers)) {
               $(".info-user").removeClass("fail").text('');
                $("#btn-password").prop('disabled', false);
                allowsubmit = true;
            }else{
                $(".info-user").addClass("fail").text('Kata sandi minimal 8 karakter terdiri dari huruf kapital dan angka');
                $("#btn-password").prop('disabled', true);
                allowsubmit = false;
            }
        });
    </script>

</section>
@endsection