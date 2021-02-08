<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<?php 
$hidden = [
   'id_thread' => $thread->id,
   'id_user' => session()->get('id'),
   'star' => 0
];
$submit = [
   'name' => 'submit',
   'value' => 'Rate!',
   'type' => 'submit',
   'id' => 'btn-rating'
];
?>
<h1><?= $thread->judul; ?></h1>
<div class="container">
   <?= $thread->isi ?>
   <br>
   <hr>
   <div class="flex-container">
      <div>
         <div>
            <?php 
            for($i = 0; $i < 5; $i++) {
               if(($i+1) <= $rating_result) {
                  echo '<span class="fa fa-star checked"></span>';
               } else {
                  echo '<span class="fa fa-star"></span>';
               }
            }
            ?>
         </div>
         <button id="btn-rating">Berikan Rating</button>
         <small>
            Created By <?= $user->username ?> on <?= $kategori->kategori ?> at <?= $thread->created_at ?>
         </small>
      </div>
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

<div id="mymodal" class="modal">
   <div class="modal-content">
      Berikan Rating Pada Thread Ini
      <div>
         <span class="fa fa-star " id="f_star_1" onclick="rate(1)"></span>
         <span class="fa fa-star " id="f_star_2" onclick="rate(2)"></span>
         <span class="fa fa-star " id="f_star_3" onclick="rate(3)"></span>
         <span class="fa fa-star " id="f_star_4" onclick="rate(4)"></span>
         <span class="fa fa-star " id="f_star_5" onclick="rate(5)"></span>
      </div>
      <?= form_open('/thread/rate'); ?>
         <?= form_hidden($hidden); ?>
         <?= form_submit($submit); ?>
      <?= form_close(); ?>
   </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
   var modal = document.getElementById('mymodal');
   var btn = document.getElementById('btn-rating');
   btn.onclick = function() {
      modal.style.display = "block";
   }
   window.onclick = function() {
      if(event.target == modal) {
         modal.style.display = "none";
      }
   }

   function rate(id) {
      document.getElementsByName('star')[0].value = id;
      switch(id) {
         case 1 :
               checked("f_star_1");
               unchecked("f_star_2");
               unchecked("f_star_3");
               unchecked("f_star_4");
               unchecked("f_star_5");
               break;
         case 2 :
               checked("f_star_1");
               checked("f_star_2");
               unchecked("f_star_3");
               unchecked("f_star_4");
               unchecked("f_star_5");
               break;
         case 3 :
               checked("f_star_1");
               checked("f_star_2");
               checked("f_star_3");
               unchecked("f_star_4");
               unchecked("f_star_5");
               break;
         case 4 :
               checked("f_star_1");
               checked("f_star_2");
               checked("f_star_3");
               checked("f_star_4");
               unchecked("f_star_5");
               break;
         case 5 :
               checked("f_star_1");
               checked("f_star_2");
               checked("f_star_3");
               checked("f_star_4");
               checked("f_star_5");
               break;
      }
   }

   function checked(star_id) {
      var element = document.getElementById(star_id);
      element.classList.add("checked");
   }

   function unchecked(star_id) {
      var element = document.getElementById(star_id);
      element.classList.remove("checked");
   }
</script>
<?= $this->endSection(); ?>