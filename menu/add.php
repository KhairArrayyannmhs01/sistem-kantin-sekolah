<html>
<head>
    <title>Tambahkan menu</title>
</head>
 
<body>
    <a href="index.php">Kembali ke halaman utama</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>jenis</td>
                <td>
                <select name="jenis"> 
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
            </select></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
            <tr> 
                <td>Penjual</td>
                <td>
                <select name="id_penjual"> 
                    <?php 
                    include_once("../config.php");
                    $penjual = mysqli_query($mysqli,"SELECT * FROM penjual ORDER BY id_penjual DESC");
                    while($data = mysqli_fetch_array($penjual)) {
                        echo '<option value="'.$data['id_penjual'].'">'.$data['nama'].'</option>';
                    }
                    ?>
            </select></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $nama = $_POST['nama'];
        $stok = $_POST['stok'];
        $id_penjual = $_POST['id_penjual'];
        
        // include database connection file
        include_once("../config.php");
        
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO menu(jenis,harga,nama,stok,id_penjual) VALUES('$jenis','$harga','$nama','$stok','$id_penjual')");
        
        // Show message when user added
        echo "Menu added successfully. <a href='index.php'>View menu</a>";
    }
    ?>
</body>
</html>