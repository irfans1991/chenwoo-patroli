<div>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Input Message</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
                </ol>
              </div>
                <!-- Alert -->
                @if(session()->has('success'))
              <div class="d-flex flex-row-reverse ">
                <div class="alert alert-success alert-dismissible " role="alert" id="alert-close">
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
                      <h6 class="m-0 font-weight-bold text-primary">Message</h6>
                    </div>
                    <div class="card-body">
                      <form wire:submit.prevent="store">
                        @csrf
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Nama :</label>
                                <input wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text" placeholder="Enter your Full Name" value="" readonly>
                                @error('name')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                              </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="title">Title :</label>
                                <input wire:model="title" class="form-control @error('title') is-invalid @enderror" id="inputLasttitle" type="text" placeholder="Enter your Full Title" value="">
                                @error('title')
                              <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                              </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col-md-12">
                          <label for="message" class=" small mb-1">Message :</label>
                          <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror " name="message" id="message" placeholder="Enter your full Message"> </textarea>
                        </div>
                        <div class="ml-3">
                        @error('message')
                      <code class="highlighter-rouge">
                      {{ $message }}
                      </code>
                      @enderror
                      </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      <hr>
                      <table class="table align-items-center table-flush mt-4">
                                        <thead class="thead-light">
                                          <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Message</th>
                                            <th>Security</th>
                                            <th>Feedback</th>
                                            <th class="text-center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                         @forelse($fetch as $row)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->message }}</td>
                                            @if($row->security)
                                            <td>{{$row->security}}</td>
                                            <td>{{$row->feedback}}</td>
                                            @else
                                            <td>null</td>
                                            <td>null</td>
                                            @endif
                                            <td class="text-center">
                                            <button wire:click="destroy({{ $row->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#checkOutVisitor"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </td>
                                            @empty
                                            <td valign="top" colspan="5" class="dataTables_empty text-center">No data available in table</td>
                                          </tr>
                                          @endforelse
                                        </tbody>
                                      </table>

                    </div>
                    <div class="card-footer"></div>
                  </div>
            </div>

            </div>
            @section('script')
<script>
  setTimeout(() => {
      $('.alert-dismissible').fadeOut()
  },3000);
// $('#inputLasttitle').on('keyup', () => {
//     alert('lost');
// });
// </script>
@endsection

</div>



