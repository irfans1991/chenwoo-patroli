<table>
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Security</th>
        <th>Kendaraan</th>
        <th>Nama Pengguna</th>
        <th>Driver</th>
        <th>kondisi</th>
        <th>Tujuan</th>
        <th>Speedometer(sebelum)</th>
        <th>Speedometer(setelah)</th>
        <th>Bahan Bakar</th>
        <th>Emisi</th>
        <th>Waktu Keluar</th>
        <th>Waktu Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transport as $row)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->security }}</td>
        <td>{{ $row->transport }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->driver }}</td>
        <td>{{ $row->condition }}</td>
        <td>{{ $row->destination }}</td>
        <td>{{ $row->before_speedometer }}</td>
        <td>{{ $row->after_speedometer }}</td>
        <td>{{ $row->fuel }}</td>
        <td>{{ ($row->after_speedometer - $row->before_speedometer)*2.3  }} L</td>
        <td>{{ $row->created_at->format('H:m') }}</td>
        <td>{{ $row->updated_at->format('H:m') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>