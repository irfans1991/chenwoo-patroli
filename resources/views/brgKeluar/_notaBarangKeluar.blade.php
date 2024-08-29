<table>
    <thead>
        <tr>
        <th>UUID</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Nama Pembeli</th>
        <th>Jenis</th>
        <th>Pembuat</th>
        <th>Penimbang</th>
        <th>Security</th>
        <th>Approve</th>
        </tr>
    </thead>
    <tbody>
        @foreach($notaBarang as $row)
        <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->created_at->format('H:i') }}</td>
        <td>{{ $row->pembeli }}</td>
        <td>{{ $row->jenisPembeli }}</td>
        <td>{{ $row->pembuat }}</td>
        <td>{{ $row->penimbang }}</td>
        <td>{{ $row->disetujui }}</td>
        <td>{{ $row->checked_by }}</td>
        </tr>
        @endforeach
    </tbody>
</table>