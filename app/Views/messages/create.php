<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Kirim Pesan Ke <?= $recepient->nama ?></h1>
<?php 
$hidden = [
   'id_sender' => session()->get('id'),
   'id_recepient' => $recepient->id,
   'is_read' => 0,
   'created' => date("Y-m-d H:i:s"),
];
$messages = [
   'name' => 'messages',
];
$submit = [
   'type' => 'submit',
   'value' => 'Kirim',
   'class' => 'button'
];
?>
<div class="container">
   <?= form_open('/messages/create/' .$recepient->id); ?>
      <?= form_hidden($hidden); ?>
      <?= form_label('Messages', 'messages'); ?>
      <?= form_input($messages); ?>

      <?= form_submit($submit); ?>
   <?= form_close(); ?>
</div>
<?= $this->endSection(); ?>