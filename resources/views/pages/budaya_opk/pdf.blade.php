<!DOCTYPE html>
<html>
<head>
    <title>Data OPK</title>
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
    
    
    <h2>Data OPK</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul OPK</th>
                    <th>Alamat Tradisi</th>
                    <th>Lokasi Tradisi</th>
                    <th>Nama Narasumber</th>
                    <th>Alamat Narasumber</th>
                    <th>No HP</th>
                    <th>Kode POS</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($takbenda as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->judul_opk }}</td>
                    <td>{{ $item->alamat_tradisi }}</td>
                    <td>{{ $item->lokasi_tradisi }}</td>
                    <td>{{ $item->nama_narasumber }}</td>
                    <td>{{ $item->alamat_narasumber }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->kode_pos }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>