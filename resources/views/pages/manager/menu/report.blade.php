<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>harga</th>
            <th>stock tersisa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $dt)
            <tr>
                <td>{{ $dt->name }}</td>
                <td>{{ $dt->deskripsi }}</td>
                <td>{{ $dt->harga }}</td>
                <td>{{ $dt->stock }}</td>
            </tr>
        @endforeach
    </tbody>
</table>