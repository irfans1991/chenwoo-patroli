<div>
<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Visitor Masuk </h6>
                    </div>
                    <div class="table-responsive">
                                      <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                          <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Security</th>
                                            <th>Nama Tamu</th>
                                            <th class="text-center">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @forelse($visitors as $visitor)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $visitor->created_at->format('l, d M Y') }}</td>
                                            <td>{{ $visitor->created_at->format('H:i') }} Wita</td>
                                            <td>{{ $visitor->security }}</td>
                                            <td>{{ $visitor->name }}</td>
                                            <td class="text-center">
                                            <button wire:click="viewVisitorDetail({{$visitor->id}})" class="btn btn-sm btn-warning " data-toggle="modal" data-target="#Detail"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                                            <button wire:click="getVisitor({{$visitor->id}})" class="btn btn-sm btn-info" data-toggle="modal" data-target="#checkOutVisitor"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            </td>
                                            @empty
                                            <td valign="top" colspan="5" class="dataTables_empty text-center">No data available in table</td>
                                          </tr>
                                          @endforelse
                                        </tbody>
                                      </table>
                                    </div>
                      </div>
                </div>
            </div>
</div>


