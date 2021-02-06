<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1><?= $thread->judul; ?></h1>
<div class="container">
   <?= $thread->isi ?>
   <br>
   <hr>
   <small>
      Created By <?= $user->username ?> on <?= $kategori->kategori ?> at <?= $thread->created_at ?>
   </small>
</div>
<?= $this->endSection(); ?>