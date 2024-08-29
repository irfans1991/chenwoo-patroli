<table>
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Keperluan</th>
        <th>Bagian</th>
        <th>Nama Karyawan</th>
        <th>HRD</th>
        <th>Security</th>
        <th>Departement</th>
        <th>status</th>
        <th>Deskripsi</th>
        <th>Jam Keluar</th>
        <th>Jam Masuk</th>
        <th>Error</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permission as $row)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->needs }}</td>
        <td>{{ $row->section }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->hrd }}</td>
        <td>{{ $row->security }}</td>
        <td>{{ $row->departement }}</td>
        <td>{{ $row->status }}</td>
        <td>{{ $row->remark }}</td>
        <td>{{ $row->created_at->format('H:i') }}</td>
        <td>{{ $row->updated_at->format('H:i') }}</td>
        @if($row->created_at == $row->updated_at)
        <td><span class="badge badge-danger">Error</span></td>
        @else
        <td><span class="badge badge-succes">Oke</span></td>
        @endif
        </tr>
        @endforeach
    </tbody>
</table>