<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $jenis=$_POST['jenis'];
    $harga=$_POST['harga'];
    $nama=$_POST['nama'];
    $stok=$_POST['stok'];
    $id_penjual=$_POST['id_penjual'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET jenis='$jenis',harga='$harga',nama='$nama',stok='$stok',id_penjual='$id_penjual' WHERE id_menu=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id_menu=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $jenis = $user_data['jenis'];
    $harga = $user_data['harga'];
    $nama = $user_data['nama'];
    $stok = $user_data['stok'];
    $id_penjual = $user_data['id_penjual'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Kembali ke halaman utama</a>
    
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>jenis</td>
                <td>
                <select name="jenis"> 
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
            </select>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>stok</td>
                <td><input type="text" name="stok" value=<?php echo $nama;?>></td>
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
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>