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
          <div class="col-lg-2 mb-4">
        </div>
            <div class="col-lg-8 mb-3">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit {{$user->name}}</h6>
                </div>
                <div class="card-body">
                <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
                  @method('PUT')
                    @csrf
                    <input type="hidden" name="users_id" value="{{ $user->id}}">
                    <div class="form-group" id="simple-date3">
                    <label for="decadeView">Tanggal Lahir :</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{$users ? $users->tgl_lahir : '' }}" id="decadeView" placeholder="01/01/2022" name="tgl_lahir"> 
                      </div>
                  </div>
                    <div class="form-group">
                      <label for="email">Email : </label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="" value="{{$users ? $users->email : '' }}" >
                      @error('email')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>
                      
                  <div class="form-group">
                      <label for="address">Alamat :</label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="" value="{{$users ? $users->alamat : '' }} " >
                      @error('alamat')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                      </div>
                  <div class="form-group">
                      <label for="telp">No . Telp</label><code class="highlighter-rouge"> *</code> 
                      <input type="text" class="text-right form-control @error('telp') is-invalid @enderror" name="telp" id="" value="{{$users ? $users->telp : '' }}" >
                      @error('telp')
                          <div class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label for="grub">Grup :</label>
                        <select class="form-control text-center" name="grub" >
                        <option selected>-- Please Choice Grub --</option>
                        <option value="Grub 1">Grub 1</option>
                        <option value="Grub 2">Grub 2</option>
                        <option value="Grub 3">Grub 3</option>
                        <option value="Grub 4">Grub 4</option>
                        <option value="Null">Nothing</option>
                        </select>
                      </div>
                    <div class="form-group">
                    <label for="photo">Upload File</label><code class="highlighter-rouge"> *</code></label>
                      <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input form-control @error('photo') is-invalid @enderror" id="customFile" value="{{$users ? $users->photo : '' }}">
                        <label class="custom-file-label" for="customFile">Upload Foto Profile</label>
                      </div>
                      <code class="highlighter-rouge">
                        @error('photo')
                      {{ $message }}
                      </code>
                      @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
@endsection