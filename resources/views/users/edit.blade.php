
@extends('header.header')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Data Users</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
            </ol>
          </div>

          <div class="row">
          <div class="col-lg-3 mb-4">
        </div>
            <div class="col-lg-6 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Upadte Data User</h6>
                </div>
                <div class="card-body">
                  <form action="/users/{{$users->id}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror " placeholder="Enter Name" value="{{ old('name', $users->name) }}" readonly>
                        @error('name')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control @error('username') is-invalid @enderror " name="username" id="username" aria-describedby="emailHelp"
                        placeholder="Enter Username" autocomplete="off" value="{{ old('username', $users->username) }}" readonly>
                        @error('username')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label><code class="highlighter-rouge"><i> * Ubah Password Anda</i> </code>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                      @error('password')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password</label><code class="highlighter-rouge"><i> * Harus sama dengan password Anda</i> </code>
                      <input type="password"  name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Password" required>
                      @error('password_confirmation')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="level">Level Access</label>
                      <select class="form-control" name="level" id="level" required>
                        <option value="{{ $users->level }}" selected>{{ $users->level }}</option>
                        <option value="admin">Administrator</option>
                        <option value="security">Security</option>
                        <option value="staff">Staff</option>
                        <option value="guest">Guest</option>
                      </select>
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