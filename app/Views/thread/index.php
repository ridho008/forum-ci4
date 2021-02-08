<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<?php 
$keyword = [
   'name' => 'keyword',
   'value' => $keyword,
   'placeholder' => 'Keyword...'
];
$submit = [
   'name' => 'submit',
   'value' => 'Cari',
   'type' => 'submit'
];
?>
<h1>Thread</h1>
<a href="/thread/create" class="button">Tambah Thread</a>
<?= form_open('/thread', ['class' => 'form-inline']); ?>
   <div>
      <?= form_input($keyword); ?>
   </div>
   <div>
      <?= form_submit($submit); ?>
   </div>
<?= form_close(); ?>
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
            <td><?= $offset + $key + 1; ?></td>
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
<?= \Config\Services::pager()->makeLinks($page, $perPage, $total, 'custom_pagination'); ?>
<?= $this->endSection(); ?>