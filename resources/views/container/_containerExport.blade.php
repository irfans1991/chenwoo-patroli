<table>
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Security</th>
        <th>Driver </th>
        <th>No. Plat</th>
        <th>Status Container</th>
        <th>Instansi/perusahaan</th>
        <th>no. Container</th>
        <th>no. Seal</th>
        <th>jenis Muatan</th>
        <th>Tujuan</th>
        <th>Posisi Container</th>
        <th>Muatan Datang</th>
        <th>Temperatur tiba</th>
        <th>Temperatur Berangkat</th>
        <th>Tanggal Berangkat</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Photo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($container as $row)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->security }}</td>
        <td>{{ $row->driver }}</td>
        <td>{{ $row->police }}</td>
        <td>{{ $row->status_container }}</td>
        <td>{{ $row->company }}</td>
        <td>{{ $row->no_container }}</td>
        <td>{{ $row->no_seal }}</td>
        <td>{{ $row->type_container }}</td>
        <td>{{ $row->destination }}</td>
        <td>{{ $row->position }}</td>
        <td>{{ $row->volume }}</td>
        <td>{{ $row->before_temperature }}</td>
        <td>{{ $row->after_temperature }}</td>
        <td>{{ $row->updated_at->format('l, d M Y') }}</td>
        <td>{{ $row->created_at->format('H:i') }}</td>
        <td>{{ $row->updated_at->format('H:i') }}</td>
        <td>{{asset('storage/public/'.$row->photo)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>