<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Buat Thread/Postingan Baru</h1>
<?php 
$judul = [
   'name' => 'judul'
];
$isi = [
   'name' => 'isi',
   'id' => 'isi'
];
$id_kategori = [
   'name' => 'id_kategori',
   'options' => $arrayKategori,
   'selected' => null
];
$submit = [
   'type' => 'submit',
   'name' => 'submit',
   'value' => 'Posting',
   'class' => 'button'
];
?>
<div class="container">
   <?= form_open('/thread/create'); ?>
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