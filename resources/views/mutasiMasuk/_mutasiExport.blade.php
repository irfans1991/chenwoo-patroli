<table>
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Security</th>
        <th>Nama Supplier</th>
        <th>Asal </th>
        <th>Supplier</th>
        <th>Driver</th>
        <th>No. Plat</th>
        <th>Total Items</th>
        <th>Surat Jalan</th>
        <th>Informasi</th>
        <th>Status</th>
        <th>Jenis Limbah</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mutasi as $row)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->security }}</td>
        <td>{{ $row->supplier_name }}</td>
        <td>{{ $row->from }}</td>
        <td>{{ $row->supplier }}</td>
        <td>{{ $row->driver }}</td>
        <td>{{ $row->police }}</td>
        <td>{{ $row->total_items }} {{ $row->unit }}</td>
        <td>{{ $row->travel_permit }}</td>
        <td>{{ $row->remark }}</td>
        <td>{{ $row->type_mutasi }}</td>
        <td>{{ $row->nota }}</td>
        <td>{{ $row->created_at->format('H:i') }}</td>
        <td>{{ $row->updated_at->format('H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>