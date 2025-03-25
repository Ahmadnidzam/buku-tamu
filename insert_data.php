<?php
// Include connection file
include 'koneksi_.php';

// Insert initial data into keperluan table
$keperluan_data = [
    ['deskripsi' => 'Konsultasi'],
    ['deskripsi' => 'Pengaduan'],
    ['deskripsi' => 'Informasi']
];

foreach ($keperluan_data as $data) {
    $deskripsi = $data['deskripsi'];
    $sql = "INSERT INTO keperluan (deskripsi) VALUES ('$deskripsi')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Inserted keperluan: $deskripsi<br>";
    } else {
        echo "Error inserting keperluan: " . $conn->error . "<br>";
    }
}

// Insert initial data into tamu table
$tamu_data = [
    [
        'nama' => 'John Doe',
        'email' => 'john@example.com',
        'pesan' => 'Ingin konsultasi tentang layanan',
        'keperluan_id' => 1
    ],
    [
        'nama' => 'Jane Smith',
        'email' => 'jane@example.com',
        'pesan' => 'Ingin mengajukan pengaduan',
        'keperluan_id' => 2
    ]
];

foreach ($tamu_data as $data) {
    $nama = $data['nama'];
    $email = $data['email'];
    $pesan = $data['pesan'];
    $keperluan_id = $data['keperluan_id'];
    
    $sql = "INSERT INTO tamu (nama, email, pesan, keperluan_id) 
            VALUES ('$nama', '$email', '$pesan', $keperluan_id)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Inserted tamu: $nama<br>";
    } else {
        echo "Error inserting tamu: " . $conn->error . "<br>";
    }
}

$conn->close();
?>