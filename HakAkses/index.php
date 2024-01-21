<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Akses</title>
</head>
<body>

<?php
// Include your class file
include_once 'Akses.php';

// Buat objek Akses
$akses = new Akses();

// Handle Create
if (isset($_POST['create'])) {
    $nama_akses = $_POST['nama_akses'];
    $keterangan = $_POST['keterangan'];

    $akses->createAkses($nama_akses, $keterangan);
}

// Handle Update
if (isset($_POST['update'])) {
    $id_akses = $_POST['id_akses'];
    $nama_akses = $_POST['nama_akses'];
    $keterangan = $_POST['keterangan'];

    $akses->updateAkses($id_akses, $nama_akses, $keterangan);
}

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_akses_to_delete = $_GET['id'];
    $akses->deleteAkses($id_akses_to_delete);
}

// Handle Read/Display
$aksesList = $akses->getAllAkses();

?>

<!-- Form untuk Create dan Update -->
<form method="post" action="">
    <label for="nama_akses">Nama Akses:</label>
    <input type="text" name="nama_akses" required>
    
    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan" required></textarea>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) : ?>
        <!-- Jika sedang dalam mode edit, tampilkan input hidden untuk menyimpan ID akses yang akan diupdate -->
        <input type="hidden" name="id_akses" value="<?php echo $_GET['id']; ?>">
        <button type="submit" name="update">Update Akses</button>
    <?php else : ?>
        <button type="submit" name="create">Tambah Akses</button>
    <?php endif; ?>
</form>

<!-- Tabel untuk menampilkan data -->
<table border="1">
    <tr>
        <th>ID Akses</th>
        <th>Nama Akses</th>
        <th>Keterangan</th>
        <th>Action</th>
    </tr>
    <?php foreach ($aksesList as $aksesItem) : ?>
        <tr>
            <td><?php echo $aksesItem['id_akses']; ?></td>
            <td><?php echo $aksesItem['nama_akses']; ?></td>
            <td><?php echo $aksesItem['keterangan']; ?></td>
            <td>
                <a href="?action=edit&id=<?php echo $aksesItem['id_akses']; ?>">Edit</a>
                <a href="?action=delete&id=<?php echo $aksesItem['id_akses']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
