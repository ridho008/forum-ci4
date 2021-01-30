<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<h1>Edit Data User <?= $user->username ?></h1>
<?php 
// $id = [
//    'name' => 'id',
//    'value' => $user->id
// ];

$username = [
   'name' => 'username',
   'value' => $user->username
];

$nama = [
   'name' => 'nama',
   'value' => $user->nama
];

$email = [
   'name' => 'email',
   'type' => 'email',
   'value' => $user->email
];

$tgl_lahir = [
   'name' => 'tgl_lahir',
   'type' => 'date',
   'value' => $user->tgl_lahir
];

$alamat = [
   'name' => 'alamat',
   'value' => $user->alamat
];

$no_telp = [
   'name' => 'no_telp',
   'type' => 'number',
   'value' => $user->no_telp
];

$avatar = [
   'name' => 'avatar',
   'value' => null
];

$submit = [
   'type' => 'submit',
   'name' => 'submit',
   'value' => 'Edit',
   'class' => 'button'
];
?>

<div class="container">
   <?= form_open_multipart('/user/update/' . $user->id); ?>
      <input type="hidden" name="id" value="<?= $user->id ?>">
      <input type="hidden" name="avatarOld" value="<?= $user->avatar ?>">
      <?= form_label('Username', 'username'); ?>
      <?= form_input($username); ?>

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

      Current Avatar<br>
      <img src="/uploads/<?= $user->avatar ?>" widht="100px" style="padding: 10px;">
      <?= form_upload($avatar); ?>

      <?= form_submit($submit); ?>
   <?= form_close(); ?>
</div>

<?= $this->endSection(); ?>