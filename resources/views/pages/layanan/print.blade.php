<!DOCTYPE html>
<html>

<head>
    <title>Rekap Hasil Layanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 10px;
        }

        .kop-surat img {
            width: 80px;
            height: auto;
        }

        .kop-surat h2,
        .kop-surat p {
            margin: 0;
        }

        .content {
            margin: 0 10px;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .field {
            display: flex;
            margin-bottom: 5px;
        }

        .field strong {
            display: inline-block;
            width: 200px;
        }

        .field p {
            display: inline-block;
            margin: 0;
        }

        .garis-batas {
            border-bottom: 2px solid black;
            margin: 10px 0;
        }

        @media print {
            /* @page {
                size: 210mm 148.5mm;
                margin: 10mm;
            } */

            body {
                width: 190mm;
                height: 128.5mm;
            }

            .kop-surat h2 {
                font-size: 16px;
            }

            .kop-surat p {
                font-size: 10px;
            }

            h1 {
                font-size: 18px;
            }

            .field strong {
                width: 110px;
            }
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <h2>POSYANDU DIGITAL LUBUK GARAM</h2>
        <p>LUBUK GARAM</p>
        <p>Telepon: (0851) 61361092 | Email: postal@gmail.com</p>
    </div>
    <div class="garis-batas"></div>
    <div class="content">
        <h1>Hasil Pemeriksaan</h1>
        <div class="field">
            <strong>Nama</strong>
            <p>{{ ': ' . $layanan->lansia->nama }}</p>
        </div>
        <div class="field">
            <strong>Berat Badan</strong>
            <p>{{ ': ' . $layanan->berat_badan . ' KG' }}</p>
        </div>
        <div class="field">
            <strong>Tinggi Badan</strong>
            <p>{{ ': ' . $layanan->tinggi_badan . ' CM' }}</p>
        </div>
        <div class="field">
            <strong>Tekanan Darah</strong>
            <p>{{ ': ' . $layanan->tekanan_darah . ' mmHg' }}</p>
        </div>
        <div class="field">
            <strong>Keluhan</strong>
            <p>{{ ': ' . $layanan->keluhan }}</p>
        </div>
        <div class="field">
            <strong>Pemeriksa</strong>
            <p>
                @if ($layanan->petugas_id)
                    {{ ': ' . 'Dokter ' . $layanan->petugas->nama }}
                @else
                    {{ ': ' . 'Kader '. $layanan->user->name }}
                @endif
            </p>
        </div>
    </div>
</body>

</html>
