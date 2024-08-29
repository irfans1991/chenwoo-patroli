<table>
    <thead>
        <tr>
        <th>UUID</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Produk</th>
        <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->created_at->format('H:i') }}</td>
        <td>{{ $row->jenisBarang }}</td>
        <td>{{ $row->harga }}</td>
        </tr>
        @endforeach
    </tbody>
</table>