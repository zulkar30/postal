<table class="table table-bordered">
    <tr>
        <th>Tanggal</th>
        <td>{{ isset($jadwal->tanggal) ? $jadwal->tanggal : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Jam</th>
        <td>{{ isset($jadwal->jam) ? $jadwal->jam : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Lokasi</th>
        <td>{{ isset($jadwal->lokasi) ? $jadwal->lokasi : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Kegiatan</th>
        <td>{{ isset($jadwal->kegiatan) ? $jadwal->kegiatan : 'N/A' }}</td>
    </tr>
</table>
