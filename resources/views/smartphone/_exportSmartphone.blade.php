<table>
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>id Uniqe</th>
        <th>Nama </th>
        <th>Bagian</th>
        <th>Merk</th>
        <th>No. Hp</th>
        </tr>
    </thead>
    <tbody>
        @foreach($smartphone as $row)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->id_phone }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->section }}</td>
        <td>{{ $row->smartphone }}</td>
        <td>{{ $row->number }}</td>
        </tr>
        @endforeach
    </tbody>
</table>