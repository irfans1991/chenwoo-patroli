<table>
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>Asal</th>
        <th>Jenis Supplier</th>
        </tr>
    </thead>
    <tbody>
        @foreach($supplier as $row)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->from }}</td>
        <td>{{ $row->supplier }}</td>
        </tr>
        @endforeach
    </tbody>
</table>