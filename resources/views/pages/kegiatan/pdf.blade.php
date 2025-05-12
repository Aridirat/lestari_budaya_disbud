<!DOCTYPE html>
<html>
<head>
    <title>Data Kegiatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Membatasi lebar kolom secara proporsional */
            word-wrap: break-word; /* Membungkus teks yang terlalu panjang */
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }

        td {
            white-space: pre-line; /* Membuat teks tetap rapi dalam batas sel */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Mengatur lebar kolom secara proporsional */
        th:nth-child(1), td:nth-child(1) {
            width: 10%;
            text-align: center;
        }

        th:nth-child(2), td:nth-child(2) {
            width: 25%;
        }

        th:nth-child(3), td:nth-child(3) {
            width: 20%;
        }

        th:nth-child(4), td:nth-child(4) {
            width: 15%;
        }

        th:nth-child(5), td:nth-child(5) {
            width: 35%;
        }
    </style>
</head>
<body>
    <h2>Data Kegiatan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Kegiatan</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kegiatans as $index => $kegiatan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kegiatan->judul_kegiatan }}</td>
                    <td>{{ $kegiatan->lokasi_kegiatan }}</td>
                    <td>{{ $kegiatan->tanggal_kegiatan }}</td>
                    <td style="word-wrap: break-word;">{{ $kegiatan->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
