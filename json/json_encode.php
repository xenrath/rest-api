<?php 
    // $mahasiswa = [
    //     [
    //         "nama" => "Saiful Labib",
    //         "nim" => "17090144",
    //         "email" => "xenrath89@gmail.com"
    //     ],
    //     [
    //         "nama" => "Saiful Labib",
    //         "nim" => "17090144",
    //         "email" => "xenrath89@gmail.com"
    //     ],
    //     [
    //         "nama" => "Saiful Labib",
    //         "nim" => "17090144",
    //         "email" => "xenrath89@gmail.com"
    //     ],
    // ];

    $dbh = new PDO('mysql:host=localhost;dbname=web002', 'root', '');
    $db = $dbh->prepare('SELECT * FROM tb_pasien');
    $db->execute();
    $mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);
    
    $data = json_encode($mahasiswa);
    echo $data;
?>