<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Thread</h1>
<a href="/thread/create" class="button">Tambah Thread</a>
<table>
   <thead>
      <tr>
         <th>No</th>
         <th>Judul</th>
         <th>Kategori</th>
         <th>Posted By</th>
         <?php if(session()->get('role') == 0) : ?>
            <th>Aksi</th>
         <?php endif; ?>
      </tr>
   </thead>
   <tbody>
      <?php $no = 1; foreach($threads as $key => $thread) : ?>
         <tr>
            <td><?= $no++; ?></td>
            <td>
               <a href="/thread/view/<?= $thread->id ?>"><?= $thread->judul; ?></a>
            </td>
            <td><?= $thread->kategori; ?></td>
            <td><?= $thread->nama; ?></td>
            <?php if(session()->get('role') == 0) : ?>
            <td>
               <a href="/thread/update/<?= $thread->id ?>">Edit</a>
               <a href="/thread/delete/<?= $thread->id ?>">Hapus</a>
            </td>
            <?php endif; ?>
         </tr>
      <?php endforeach; ?>
   </tbody>
</table>
<?= $this->endSection(); ?>