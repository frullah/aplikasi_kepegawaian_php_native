<?php

require "./koneksi.php";
require "./helper.php";

$db = new Database();

$list_pegawai = $db->find_all("SELECT * FROM pegawai");

?>

<!DOCTYPE html>
<html lang="en">
<? include "./templates/html_head.php" ?>
<body>
  <main class="container py-4">
    <h4 class="mb-4">Aplikasi Kepegawaian</h4>

    <? include "./templates/flash.php" ?>
    
    <section class="mb-3">
      <a class="btn btn-primary" href="tambah.php">Tambah Data Pegawai</a>
    </section>
    
    <table class="table table-responsive table-bordered">
      <thead>
        <th class="fit">No.</th>
        <th class="fit">NIP</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Gaji</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <? $row = 1 ?>
        <? foreach ($list_pegawai as $pegawai): ?>
          <tr>
            <td class="fit"><?= $row++ ?></td>
            <td class="fit"><?= $pegawai['nip'] ?></td>
            <td><?= $pegawai['nama'] ?></td>
            <td><?= Helper::jenis_kelamin($pegawai['jenis_kelamin']) ?></td>
            <td><?= Helper::format_date($pegawai['tanggal_lahir']) ?></td>
            <td><?= $pegawai['gaji'] ?></td>
            <td class="fit">
              <a class="btn btn-primary" href="ubah.php?id=<?= $pegawai['id'] ?>">Ubah</a>
              <a class="btn btn-danger" href="hapus.php?id=<?= $pegawai['id'] ?>">Hapus</a>
            </td>
          </tr>
        <? endforeach ?>
      </tbody>
    </table>
  </main>
</body>
</html>