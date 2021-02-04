<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>User</h1>
<a href="/user/create" class="button">Tambah User</a>
<table>
   <thead>
      <tr>
         <th>No</th>
         <th>Username</th>
         <th>Nama</th>
         <th>Email</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php $no = 1; foreach($user as $key => $u) : ?>
         <?php if($u->id != 1) : ?>
         <tr>
            <td><?= $no++; ?></td>
            <td>
               <a href="/user/view/<?= $u->id; ?>"><?= $u->username; ?></a></td>
            <td><?= $u->nama; ?></td>
            <td><?= $u->email; ?></td>
            <td>
               <a href="/user/update/<?= $u->id ?>">Edit</a>
               <a href="/user/delete/<?= $u->id ?>">Hapus</a>
            </td>
         </tr>
      <?php endif; ?>
      <?php endforeach; ?>
   </tbody>
</table>
<?= $this->endSection(); ?>