<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Tambah Data User</h1>
<?php 
$username = [
   'name' => 'username'
];

$password = [
   'name' => 'password'
];

$reapetPassword = [
   'name' => 'reapetPassword'
];

$nama = [
   'name' => 'nama'
];

$email = [
   'name' => 'email',
   'type' => 'email'
];

$tgl_lahir = [
   'name' => 'tgl_lahir',
   'type' => 'date'
];

$alamat = [
   'name' => 'alamat'
];

$no_telp = [
   'name' => 'no_telp',
   'type' => 'number'
];

$avatar = [
   'name' => 'avatar'
];

$submit = [
   'type' => 'submit',
   'name' => 'submit',
   'value' => 'Tambah',
   'class' => 'button'
];
?>

<div class="container">
   <?= form_open_multipart('/user/create'); ?>
      <?= form_label('Username', 'username'); ?>
      <?= form_input($username); ?>

      <?= form_label('Password', 'password'); ?>
      <?= form_password($password); ?>

      <?= form_label('ReapetPassword', 'reapetPassword'); ?>
      <?= form_password($reapetPassword); ?>

      <?= form_label('Nama', 'nama'); ?>
      <?= form_input($nama); ?>

      <?= form_label('Tanggal Lahir', 'tgl_lahir'); ?>
      <?= form_input($tgl_lahir); ?>

      <?= form_label('Email', 'email'); ?>
      <?= form_input($email); ?>

      <?= form_label('No.Hp', 'no_telp'); ?>
      <?= form_input($no_telp); ?>

      <?= form_label('Alamat', 'alamat'); ?>
      <?= form_textarea($alamat); ?>

      <?= form_label('avatar', 'avatar'); ?>
      <?= form_upload($avatar); ?>

      <?= form_submit($submit); ?>
   <?= form_close(); ?>
</div>

<?= $this->endSection(); ?>