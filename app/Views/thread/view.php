<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1><?= $thread->judul; ?></h1>
<div class="container">
   <?= $thread->isi ?>
   <br>
   <hr>
   <div class="flex-container">
      <small>
         Created By <?= $user->username ?> on <?= $kategori->kategori ?> at <?= $thread->created_at ?>
      </small>
      <div style="margin: auto;">
         <h1><a href="/reply/create/<?= $thread->id ?>">Reply</a></h1>
      </div>
   </div>
</div>
<hr>
   <div style="text-align: center;">
      <h1>Semua Komentar</h1>
   </div>
<hr>

<?php foreach($reply as $r) : ?>
   <div class="container" style="margin-top: 30px;">
      <div class="flex-container">
         <div style="text-align: center;">
            <!-- Untuk Foto -->
            <img src="/uploads/<?= $r->avatar ?>" width="50"><br>
            <small><strong><?= $r->nama ?></strong></small>
            <small><?= date('d-m-Y', strtotime($r->created_at)) ?></small>
         </div>
         <div style="margin-left: 20px;">
            <!-- Untuk isi -->
            <?= $r->isi ?>
         </div>
      </div>
      <div style="float: right;">
         <a href="/reply/edit/<?= $r->id; ?>">Edit</a>
         <a href="/reply/delete/<?= $r->id; ?>/<?= $thread->id ?>">Hapus</a>
      </div>
   </div>
<?php endforeach; ?>
<?= $this->endSection(); ?>