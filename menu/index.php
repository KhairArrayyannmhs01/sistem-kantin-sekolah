<?php
// Create database connection using config file
include_once("../config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT m.jenis, m.harga, m.nama, m.stok,m.id_menu, p.nama as nama_penjual FROM menu  m
                                inner join penjual p on p.id_penjual=m.id_penjual
                                ORDER BY m.id_menu DESC;");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Tambahkan menu</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>jenis</th> <th>harga</th> <th>nama</th> <th>stok</th> <th>penjual</th> <th>update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['jenis']."</td>";
        echo "<td>".$user_data['harga']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['stok']."</td>"; 
        echo "<td>".$user_data['nama_penjual']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id_menu]'>Edit</a> | <a href='delete.php?id_menu=$user_data[id_menu]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>