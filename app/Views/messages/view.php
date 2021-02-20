<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Lihat Pesan</h1>
<a href="/messages/outbox">Go to outbox</a>

<div class="container">
   <div>
      From : <?= $sender->nama ?><br>
      To : <?= $recepient->nama ?><br>
   </div>
   <hr>
   <h4>Message : </h4>
   <?= $messages->messages ?>
   <hr>
   <a href="/messages/create/<?= $sender->id ?>"></a>
</div>
<?= $this->endSection(); ?>