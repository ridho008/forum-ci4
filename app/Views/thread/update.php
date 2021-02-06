<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Ubah Thread <?= $thread->judul; ?></h1>
<?php 
$id = [
   'id' => $thread->id
];
$judul = [
   'name' => 'judul',
   'value' => $thread->judul
];
$isi = [
   'name' => 'isi',
   'id' => 'isi',
   'value' => $thread->isi
];
$id_kategori = [
   'name' => 'id_kategori',
   'options' => $arrayKategori,
   'selected' => $thread->id_kategori
];
$submit = [
   'type' => 'submit',
   'name' => 'submit',
   'value' => 'Perbarui',
   'class' => 'button'
];
?>
<div class="container">
   <?= form_open('/thread/update/'.$thread->id); ?>
      <?= form_hidden($id); ?>
      <?= form_label('Judul Postingan', 'judul'); ?>
      <?= form_input($judul); ?>

      <?= form_label('Kategori', 'id_kategori'); ?>
      <?= form_dropdown($id_kategori);; ?>

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
         uploadUrl: "<?= base_url('/thread/uploadImages') ?>"
      }
    } ).then( editor => {
        console.log( editor );
    } ).catch( error => {
        console.error( error );
    } );
</script>
<?= $this->endSection(); ?>