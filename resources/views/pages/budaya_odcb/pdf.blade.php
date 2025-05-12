<!DOCTYPE html>
<html>
<head>
    <title>Data ODCB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
            word-wrap: break-word;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
            vertical-align: top;
            white-space: pre-line;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }

        /* Menyesuaikan lebar kolom secara proporsional */
        th:nth-child(1), td:nth-child(1) {
            width: 5%;
        }

        th:nth-child(2), td:nth-child(2) {
            min-width: 150px;
        }

        th:nth-child(3), td:nth-child(3) {
            min-width: 100px;
        }

        th:nth-child(4), td:nth-child(4) {
            min-width: 150px;
        }

        th:nth-child(5), td:nth-child(5) {
            min-width: 120px;
        }

        th:nth-child(6), td:nth-child(6) {
            min-width: 150px;
        }

        th:nth-child(7), td:nth-child(7) {
            min-width: 100px;
        }
    </style>
</head>
<body>
    <h2>Data ODCB</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obyek</th>
                    <th>Kategori</th>
                    <th>Lokasi Penemuan</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($benda as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_obyek }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->lokasi_penemuan }}</td>
                    <td>{{ $item->nama_pemilik }}</td>
                    <td>{{ $item->alamat_pemilik }}</td>
                    <td>{{ $item->status_pemilik }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>