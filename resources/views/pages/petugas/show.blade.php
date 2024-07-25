<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ isset($petugas->nama) ? $petugas->nama : 'N/A' }}</td>
    </tr>
    <tr>
        <th>NIP</th>
        <td>{{ isset($petugas->nip) ? $petugas->nip : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
            @if ($petugas->jenis_kelamin == 'laki-laki')
                <span>{{ 'Laki-laki' }}</span>
            @elseif($petugas->jenis_kelamin == 'perempuan')
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>NO HP</th>
        <td>{{ isset($petugas->no_hp) ? $petugas->no_hp : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td>{{ isset($petugas->tempat_lahir) ? $petugas->tempat_lahir : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ isset($petugas->tanggal_lahir) ? $petugas->tanggal_lahir : 'N/A' }}</td>
    </tr>
</table>
