<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Detail User <?= $user->username; ?></h1>
<a href="/messages/create/<?= $user->id ?>">Kirim Pesan</a>
<div class="flex-container">
   <div style="padding-top: 10px;">
      <img src="/uploads/<?= $user->avatar; ?>" width="300px">
   </div>
   <div style="padding-left: 20px; width:-webkit-fill-available">
      <table>
         <tr>
            <td><strong>Nama</strong></td>
            <td><?= $user->nama; ?></td>
         </tr>
         <tr>
            <td><strong>Username</strong></td>
            <td><?= $user->username; ?></td>
         </tr>
         <tr>
            <td><strong>Email</strong></td>
            <td><?= $user->email; ?></td>
         </tr>
         <tr>
            <td><strong>Alamat</strong></td>
            <td><?= $user->alamat; ?></td>
         </tr>
         <tr>
            <td><strong>No.Hp</strong></td>
            <td><?= $user->no_telp; ?></td>
         </tr>
         <tr>
            <td><strong>Tanggal Lahir</strong></td>
            <td><?= $user->tgl_lahir; ?></td>
         </tr>
      </table>
   </div>
</div>
<?= $this->endSection(); ?>