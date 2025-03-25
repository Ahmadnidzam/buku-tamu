<?php

include 'koneksi.php';


$query = "SELECT 
            tamu.nama, 
            tamu.email, 
            tamu.pesan, 
            keperluan.deskripsi AS keperluan 
          FROM tamu 
          JOIN keperluan ON tamu.keperluan_id = keperluan.id 
          LIMIT 5";


$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tamu</title>
</head>
<body>
    <h1>Daftar Tamu</h1>
    
    <?php

    if (mysqli_num_rows($result) > 0) {
   
        while ($data = mysqli_fetch_array($result)) {
            echo "<p>";
            echo "Nama: " . $data['nama'] . "<br>";
            echo "Email: " . $data['email'] . "<br>";
            echo "Keperluan: " . $data['keperluan'] . "<br>";
            echo "Pesan: " . $data['pesan'];
            echo "</p>";
            echo "<hr>";
        }
    } else {
        echo "Tidak ada data tamu";
    }
    ?>
</body>
</html>

<?php

mysqli_close($conn);
?>