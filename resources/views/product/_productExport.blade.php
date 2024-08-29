<table>
    <thead>
        <tr>
        <th>UUID</th>
        <th>Tanggal</th>
        <th>Product</th>
        <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $row)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->jenisBarang }}</td>
        <td>{{ $row->harga }}</td>
        </tr>
        @endforeach
    </tbody>
</table>