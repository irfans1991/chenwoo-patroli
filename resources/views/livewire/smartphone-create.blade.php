<div>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Input Data Smartphone</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
                </ol>
              </div>
                <!-- Alert -->
                @if(session()->has('success'))
              <div class="d-flex flex-row-reverse">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                {{ session('success') }}
                </div>
              </div>
              @endif
                <!-- alert -->
              <div class="row">
              <div class="col-lg-3 mb-4">
            </div>
                <div class="col-lg-12 mb-4">
                  <!-- Simple Tables -->
                  <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengguna Smartphone</h6>
                      @can('admin_staff')
                      <a href="/exportSmartphone" class="btn btn-success mb-1 bd-highlight"><i class="far fa-file-excel"> Excel</i></a>
                      @endcan
                    </div>
                    <div class="card-body">
                      <form wire:submit.prevent="store">
                        @csrf
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">ID Smartphone :</label>
                                <input wire:model="id_phone" class="form-control @error('id_phone') is-invalid @enderror" id="id_phone" type="text" placeholder="Enter your Full Name" value="{{$smartphone}}" readonly>
                                @error('id_phone')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                              </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Your Name :</label>
                                <input wire:model="name" class="form-control @error('name') is-invalid @enderror" id="inputLastName" type="text" placeholder="Enter your Full Name" value="">
                                @error('name')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                              </div>
                        </div>
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                          <label for="section" class=" small mb-1">Section :</label>
                          <select wire:model="section" class="form-control @error('section') is-invalid @enderror" name="section" id="section" required>
                            <option value="0" selected>Please Choose Section</option>
                            <option value="produksi" selected>Produksi</option>
                            <option value="sanitasi">Sanitasi</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Smartphone Type :</label>
                                <input wire:model="smartphone" class="form-control @error('smartphone') is-invalid @enderror" id="smartphone" type="text" placeholder="Enter Your Smartphone Type" value="">
                            </div>
                            @error('smartphone')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Number Phone :</label>
                                    <input wire:model="number" class="form-control @error('number') is-invalid @enderror" id="inputLastName" name="number" type="number" placeholder="Enter Your Number Phone" value="">
                                </div>
                                @error('number')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      <hr>
                      <table class="table align-items-center table-flush mt-4">
                                        <thead class="thead-light">
                                          <tr>
                                            <th>#</th>
                                            <th>Verification Number</th>
                                            <th>Nama</th>
                                            <th>Bagian</th>
                                            <th>Jenis HP</th>
                                            <th>No. HP</th>
                                            <th class="text-center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @forelse($smartphones as $row)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->id_phone }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->section }}</td>
                                            <td>{{ $row->smartphone }}</td>
                                            <td>{{ $row->number }}</td>
                                            <td class="text-center">
                                            <button wire:click="destroy({{ $row->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#checkOutVisitor"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </td>
                                            @empty
                                            <tbody>
                                            <tr class="odd">
                                            <td valign="top" colspan="5" class="dataTables_empty">No data available in table</td>
                                            </tr>
                                            </tbody>
                                          </tr>
                                          @endforelse
                                        </tbody>
                                      </table>

                    </div>
                    <div class="card-footer"></div>
                  </div>
</div>

</div>
</div>
