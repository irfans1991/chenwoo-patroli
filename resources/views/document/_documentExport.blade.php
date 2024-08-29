<table>
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Perusahaan/Instansi</th>
        <th>Alamat</th>
        <th>Security</th>
        <th>Jenis Document</th>
        <th>Pengirim</th>
        <th>Penerima</th>
        </tr>
    </thead>
    <tbody>
        @foreach($document as $row)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->created_at->format('H:m') }}</td>
        <td>{{ $row->company }}</td>
        <td>{{ $row->address }}</td>
        <td>{{ $row->security }}</td>
        <td>{{ $row->document_type }}</td>
        <td>{{ $row->sender }}</td>
        <td>{{ $row->receiver }}</td>
        @endforeach
    </tbody>
</table>