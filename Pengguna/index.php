<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pengguna</title>
</head>
<body>

<?php
// Include your class file
include_once 'Pengguna.php';

// Buat objek Pengguna
$pengguna = new Pengguna();

// Handle Create
if (isset($_POST['create'])) {
    $nama_pengguna = $_POST['nama_pengguna'];
    $password = $_POST['password']; 
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $id_akses = $_POST['id_akses'];

    $pengguna->createPengguna($nama_pengguna, $password, $nama_depan, $nama_belakang, $no_hp, $alamat, $id_akses);
}

// Handle Update
if (isset($_POST['update'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $password = $_POST['password'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $id_akses = $_POST['id_akses'];

    $pengguna->updatePengguna($id_pengguna, $nama_pengguna, $password, $nama_depan, $nama_belakang, $no_hp, $alamat, $id_akses);
}

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_pengguna_to_delete = $_GET['id'];
    $pengguna->deletePengguna($id_pengguna_to_delete);
}

// Handle Read/Display
$penggunaList = $pengguna->getAllPengguna();

?>

<!-- Form untuk Create dan Update -->
<form method="post" action="">
    <label for="nama_pengguna">Nama Pengguna:</label>
    <input type="text" name="nama_pengguna" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <label for="nama_depan">Nama Depan:</label>
    <input type="text" name="nama_depan" required>
    
    <label for="nama_belakang">Nama Belakang:</label>
    <input type="text" name="nama_belakang" required>

    <label for="no_hp">No HP:</label>
    <input type="text" name="no_hp" required>
    
    <label for="alamat">Alamat:</label>
    <textarea name="alamat" required></textarea>
    
    <label for="id_akses">ID Akses:</label>
    <input type="text" name="id_akses" required>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) : ?>
        <input type="hidden" name="id_pengguna" value="<?php echo $_GET['id']; ?>">
        <button type="submit" name="update">Update Pengguna</button>
    <?php else : ?>
        <button type="submit" name="create">Tambah Pengguna</button>
    <?php endif; ?>
</form>


<table border="1">
    <tr>
        <th>ID Pengguna</th>
        <th>Nama Pengguna</th>
        <th>Password</th>
        <th>Nama Depan</th>
        <th>Nama Belakang</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>ID Akses</th>
        <th>Action</th>
    </tr>
    <?php foreach ($penggunaList as $penggunaItem) : ?>
        <tr>
            <td><?php echo $penggunaItem['id_pengguna']; ?></td>
            <td><?php echo $penggunaItem['nama_pengguna']; ?></td>
            <td><?php echo "*****";?></td>
            <td><?php echo $penggunaItem['nama_depan']; ?></td>
            <td><?php echo $penggunaItem['nama_belakang']; ?></td>
            <td><?php echo $penggunaItem['no_hp']; ?></td>
            <td><?php echo $penggunaItem['alamat']; ?></td>
            <td><?php echo $penggunaItem['id_akses']; ?></td>
            <td>
                <a href="?action=edit&id=<?php echo $penggunaItem['id_pengguna']; ?>">Edit</a>
                <a href="?action=delete&id=<?php echo $penggunaItem['id_pengguna']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
