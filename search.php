<!DOCTYPE HTML>
<html>
<head>
    <tilte>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <h1>Hasil pencarian DATA MAHASISWA</h1>
    <table>
        <tr>
            <th> ID </th>
            <th> Nama </th>
            <th> Alamat </th>
            <th> Foto </th>
            <th> Aksi </th>
        </tr>
        <?php
            $nama = $_GET["carinama"];
            include "myconnection.php";

            $query = "SELECT * FROM student WHERE name LIKE '%$nama%'";
            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td> <?php echo $row["id"]; ?> </td>
            <td> <?php echo $row["name"]; ?> </td>
            <td> <?php echo $row["address"]; ?> </td>
            <td> <img src="<?php echo $row["photo"];?>" width=100 height=100> </td>
            <td>
                <a href="editForm.php?id=<?php echo $row["id"];?>">
                <button>Edit</button> </a>
                <a href="delete.php?id=<?php echo $row["id"]?>">
                <button>Hapus</button> </a>
            </td>
        </tr>
        <?php
                }
            }
            else{
                echo "0 results";
            }
        ?>
    </table>
    <a href="homeCRUD.php">Kembali ke Home</a>
</body>
</html>