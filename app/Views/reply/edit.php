<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Reply Komentar <i><?= $thread->judul ?></i></h1>
<?php 
$hidden = [
   'id' => $reply->id,
   'id_thread' => $thread->id,
   'id_user' => session()->get('id'),
   'updated_at' => date('Y-m-d H:i:s'),
   'updated_by' => session()->get('id')
];
$isi = [
   'name' => 'isi',
   'id' => 'isi',
   'value' => $reply->isi
];
$submit = [
   'type' => 'submit',
   'name' => 'submit',
   'value' => 'Reply',
   'class' => 'button'
];
?>
<div class="container">
   <?= form_open('/reply/edit/'.$reply->id); ?>
      <?= form_hidden($hidden); ?>
      <?= form_label('Isi', 'isi'); ?>
      <?= form_textarea($isi); ?>

      <?= form_submit($submit); ?>
   <?= form_close(); ?>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/ckeditor/ckeditor.js"></script>
<script>
   ClassicEditor
    .create( document.querySelector( '#isi' ), {
      ckfinder:{
         uploadUrl: "<?= base_url('/reply/uploadImages') ?>"
      }
    } ).then( editor => {
        console.log( editor );
    } ).catch( error => {
        console.error( error );
    } );
</script>
<?= $this->endSection(); ?>