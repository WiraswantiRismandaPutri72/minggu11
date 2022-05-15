<?php
    include "myconnection.php";

    $target_path = "foto/";

    $target_path = $target_path . basename(
        $_FILES['myphoto']['name']);

    if(move_uploaded_file($_FILES['myphoto']['tmp_name'],$target_path)){
        $foto = $target_path;
    }

    $name = $_GET["myname"];
    $address = $_GET["myaddress"];

    $query = "INSERT INTO student(name,address,photo)
            VALUE('$name', '$address', '$foto')";

    if(mysqli_query($connect, $query)){
        echo "Data baru berhasil ditambahkan";
    }
    else{
        echo "Data baru gagal ditambahkan <br>". mysqli_error($connect);
    }

    mysqli_close($connect);
?>