<table>
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Document</th>
        <th>Security</th>
        <th>Email</th>
        <th>Guest</th>
        <th>Nama Tamu</th>
        <th>ID</th>
        <th>No Plat</th>
        <th>Perusahaan/instansi</th>
        <th>Bertemu</th>
        <th>Tujuan</th>
        <th>Info</th>
        <th>Status</th>
        <th>Waktu Masuk</th>
        <th>Waktu Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($visitors as $row)
        <tr>
        <td>tester</td>
        <td>{{ $row->created_at->format('l, d M Y') }}</td>
        <td>{{ $row->document }}</td>
        <td>{{ $row->security }}</td>
        <td>{{ $row->email}}</td>
        <td>{{ $row->guest }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->idCard }}</td>
        <td>{{ $row->police }}</td>
        <td>{{ $row->company }}</td>
        <td>{{ $row->meet }}</td>
        <td>{{ $row->purpose }}</td>
        <td>{{ $row->info }}</td>
        <td>{{ $row->status }}</td>
        <td>{{ $row->created_at->format('H:i') }}</td>
        <td>{{ $row->updated_at->format('H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>