<!-- app/Views/pdf_template.php -->
<html>
<head>
    <style>
        body {
            background-image: url(<?= $background_image ?>);
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            background-color: yellow;
            border-collapse: collapse;
            margin-top: 50px;
        }

        th {
            background-color: #07586F;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Your Custom PDF</h1>
    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/e/eb/Manchester_City_FC_badge.svg/1200px-Manchester_City_FC_badge.png" width="100px" height="100px" >
    <p><?= $background_image ?></p>
    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Penerima Undangan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Do'a & Harapan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $number = 1;
            foreach ($guestList as $guest) {
                echo '
                <tr>
                <td width="5%">'.$number++.'</td>
                <td width="20%">'.$guest['name'].'</td>
                <td width="10%">'.$guest['status'].'</td>
                <td width="65%">'.$guest['wishes'].'</td>
                </tr>
                ';
            }?>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</body>
</html>