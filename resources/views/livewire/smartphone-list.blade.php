<div>
          
                                      <table class="table align-items-center table-flush">
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
                                            <button wire:click="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Detail">Detail</button>
                                            <button wire:click="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#checkOutVisitor">Keluar</button>
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
