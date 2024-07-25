<table class="table table-bordered">
    <tr>
        <th>Nama Lansia</th>
        <td>{{ isset($layanan->lansia->nama) ? $layanan->lansia->nama : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Berat Badan</th>
        <td>{{ isset($layanan->berat_badan) ? $layanan->berat_badan . ' KG' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tinggi Badan</th>
        <td>{{ isset($layanan->tinggi_badan) ? $layanan->tinggi_badan . ' CM' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Tekanan Darah</th>
        <td>{{ isset($layanan->tekanan_darah) ? $layanan->tekanan_darah . ' mmHg' : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Keluhan</th>
        <td>{{ isset($layanan->keluhan) ? $layanan->keluhan : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Nama Petugas</th>
        <td>{{ isset($layanan->petugas->nama) ? $layanan->petugas->nama : 'N/A' }}</td>
    </tr>

</table>
