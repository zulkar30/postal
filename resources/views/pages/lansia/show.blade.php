<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ isset($lansia->nama) ? $lansia->nama : 'N/A' }}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>{{ isset($lansia->nik) ? $lansia->nik : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>
            @if ($lansia->jenis_kelamin == 'laki-laki')
                <span>{{ 'Laki-laki' }}</span>
            @elseif($lansia->jenis_kelamin == 'perempuan')
                <span>{{ 'Perempuan' }}</span>
            @else
                <span>{{ 'N/A' }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>NO HP</th>
        <td>{{ isset($lansia->no_hp) ? $lansia->no_hp : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td>{{ isset($lansia->tempat_lahir) ? $lansia->tempat_lahir : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ isset($lansia->tanggal_lahir) ? $lansia->tanggal_lahir : 'N/A' }}</td>
    </tr>
</table>
