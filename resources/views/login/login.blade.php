@extends('header.headerLogin')
@section('content')
<div class="container-fluid px-1 px-md-2 px-lg-1 px-xl-5 py-3 mx-auto d-flex justify-content-center mt-5" >
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-1">
                        <div class="row">
                            <!-- <img src="{{asset('img/logo/logo-cwf.png')}}" class="logo"> -->
                        </div>
                        <div class="row px-2 justify-content-center mt-5 mb-3">
                            <img src="{{asset('img/logo/isometri-logo.png')}}" class="image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-3">
                        <div class="row mb-1 px-3">
                             <h6 class="mb-1 mr-1 mt-1 judul" style="margin-left:0px;"> APLIKASI MANAGEMENT PATROLI | PT CHEN WOO FISHERY</h6>
                            <!-- <div class="facebook text-center mr-3"><div class="fa fa-facebook"></div></div>
                            <div class="twitter text-center mr-3"><div class="fa fa-twitter"></div></div>
                            <div class="linkedin text-center mr-3"><div class="fa fa-linkedin"></div></div> -->
                        </div>
                        <hr>
                        @if(session()->has('loginError'))
                        <div class="row px-3">
                            <a class="text-danger ">
                                {{ session('loginError') }}
                            </a>
                        </div>
                        @endif

                        <form action="/" method="post">
                        @csrf
                        @error('username')
                        <div class="row px-3">
                        <small>
                            <a class="text-danger ">
                                {{ $message }}
                            </a>
                        </small>
                        </div>
                        @enderror
                        <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Username</h6></label>
                            <input class="mb-4 is-invalid" type="input" name="username" id="username" placeholder="Enter a valid email address" value="{{ @old('username') }}" autofocus>
                           
                        </div>
                        @error('password')
                        <div class="row px-3">
                        <small>
                            <a class="text-danger ">
                                {{ $message }}
                            </a>
                        </small>
                        </div>
                        @enderror
                        <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                            <input type="password" name="password" id="username" class="passwd" value="{{ @old('password') }}" placeholder="Enter password" required>
                            <span class="show-hide">
                                <i class="fa fa-eye password-show"></i>
                            </span>
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input id="chk1" type="checkbox" class="custom-control-input"> 
                                <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                            </div>
                            <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                        </div>
                        <div class="row mb-3 px-3">
                            <button type="submit" class="btn btn-blue text-center">Login</button>
                        </div>
                        </form>
                        <div class="row mb-4 px-3">
                            <small class="font-weight-bold" style="color:black;">Don't have an account? <a class="text-danger submit">Register</a></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4" style="background-color:#0623ff;">
                <div class="row px-3">
                    <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2022. IT SUPPORT | DEV | CHENWOO</small>
                    <div class="social-contact ml-4 ml-sm-auto">
                        <span class="fa fa-globe mr-4 text-sm" style="color:white;"></span><a href="http://www.chenwoofishery.com/" target="_blank" style="color:white;">www.chenwoofishery.com</a>
                        <span class="fa fa-google-plus mr-4 text-sm"></span>
                        <span class="fa fa-linkedin mr-4 text-sm"></span>
                        <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptLogin')
<script>
    $(function(){
        $(".password-show").click(function(event){
            $(this).toggleClass('fa-eye-slash');
            var x = $(".passwd").attr("type");
            //getting attribute in variable
            if(x == "password"){
                $(".passwd").attr("type", "text");
            }else{
                $(".passwd").attr("type", "password")
            }
        });
    });

</script>
@endsection
