@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile User</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
            </ol>
          </div>

          <div class="row">
          <div class="col-lg-1 mb-4">
        </div>
            <div class="col-lg-12 mb-3">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
            <!-- profile -->
            <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <!-- Profile picture image-->
                                    @if($profiles)
                                    <img class="img-account-profile rounded-circle mb-2" src="{{asset('storage/public/'. $profiles->photo)}}" alt="tester">
                                    @else
                                    <img class="img-account-profile rounded-circle mb-2" src="{{ asset('img/avatar_kosong.jpg') }}" alt="tester">
                                    @endif
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">Foto Profile</div>
                                    <!-- Profile picture upload button-->
                                    <button class="btn btn-primary" type="button">Upload new image</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Profile Details</div>
                                <div class="card-body">
                                    <form>
                                        <!-- Form Group (username)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputUsername">Nama Lengkap :</label>
                                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="{{ auth()->user()->name }}">
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">User Name :</label>
                                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{ auth()->user()->username }}">
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Last name</label>
                                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="{{ $profiles ? $pecahNama[1] : '' }}">
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (organization name)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Alamat :</label>
                                                <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization" value="{{ $profiles ? $profiles->alamat : ''  }}">
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLocation">Location</label>
                                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="{{ $profiles ? 'Makassar, Indonesia' : '' }}">
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{ $profiles ? $profiles->email : ''  }}">
                                            </div>
                                            @if(empty($profiles))
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="grub">Grub</label>
                                                <input class="form-control" id="grub" type="email" placeholder="Enter your Grub" value="">
                                            </div>
                                            @else
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="grub">Grub</label>
                                                <input class="form-control" id="grub" type="email" placeholder="Enter your email address" value="{{ $profiles->grub !== Null ? $profiles->grub : 'Nothing'  }}">
                                            </div>
                                            @endif
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (phone number)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                                <input class="form-control" id="inputPhone" type="telp" placeholder="Enter your phone number" value="{{ $profiles ? $profiles->telp : ''  }}">
                                            </div>
                                            <!-- Form Group (birthday)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="{{ $profiles ? $profiles->tgl_lahir : ''  }}">
                                            </div>
                                        </div>
                                        <!-- Save changes button-->
                                        <!-- <button class="btn btn-primary" type="button">Save changes</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
@endsection