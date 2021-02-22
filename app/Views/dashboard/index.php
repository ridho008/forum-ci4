<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>
<div class="container-white">
   <div class="row">
      <div class="column">
         <h2 class="title-statistik">Total Thread</h2>
         <div class="hero-text"><?= $jumlah_thread ?></div>
      </div>
      <div class="column">
         <h2 class="title-statistik">Total User</h2>
         <div class="hero-text"><?= $jumlah_user ?></div>
      </div>
   </div>
   <div class="row p-5">
      <div class="column">
         <div class="container-white">
            <h4>Thread Per Kategori</h4>
            <canvas id="thread_kategori" width="400" height="400"></canvas>
         </div>
      </div>
      <div class="column">
         <div class="container-white">
           <!--  <h4>User Per Tahun Lahir</h4>
            <canvas id="tahun_lahir" width="400" height="400"></canvas> -->
            <h4>Thread Per Rating</h4>
            <canvas id="thread_rating" width="400" height="400"></canvas>
            <?php foreach ($thread_per_rating->getResult() as $key => $value) : ?>
              <?= $value->jumlahThread ?>
               <?= $value->id_thread ?>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="Chart.bundle.min.js"></script>
<script>
   var thread_kategori = document.getElementById('thread_kategori');
   var data_thread_kategori = [];
   var label_thread_kategori = [];

   <?php foreach($thread_per_kategori->getResult() as $key => $value) : ?>
      data_thread_kategori.push(<?= $value->jumlah ?>)
      label_thread_kategori.push('<?= $value->kategori ?>')
   <?php endforeach; ?>

   var data_thread_kategori = {
      datasets: [{
         data: data_thread_kategori,
         backgroundColor: [
            'rgba(255,99,132,0.8)',
            'rgba(54,162,235,0.8)',
            'rgba(255,206,86,0.8)',
         ],
      }],
      labels: label_thread_kategori,
   }

   var chart_thread_kategori = new Chart(thread_kategori, {
      type: 'doughnut',
      data: data_thread_kategori
   });

   // Tahun Lahir
   var tahun_lahir = document.getElementById('tahun_lahir');
   var data_tahun_lahir = [];
   var label_tahun_lahir = [];

   <?php foreach($tahun_lahir_user->getResult() as $key => $value) : ?>
     data_tahun_lahir.push(<?= $value->jumlah ?>)
     label_tahun_lahir.push('<?= $value->tahun_lahir ?>')
   <?php endforeach; ?>

   var data_user_per_tahun_lahir = {
      datasets: [{
         label: 'jumlah',
         data: data_tahun_lahir,
         backgroundColor: 'rgba(255,99,132,0.8)',
      }],
      labels: label_tahun_lahir,
   }

   var chart_tahun_lahir = new Chart(tahun_lahir, {
      type: 'bar',
      data: data_user_per_tahun_lahir
   })

   // Thread Rating
   var thread_rating = document.getElementById('thread_rating');
   var data_thread_rating = [];
   var label_thread_rating = [];

   <?php foreach ($thread_per_rating->getResult() as $key => $value) : ?>
      data_thread_rating.push(<?= $value->jumlahThread ?>);
      label_thread_rating.push('<?= $value->id_thread ?>')
   <?php endforeach; ?>

   var data_thread_rating = {
      datasets: [{
         data: data_thread_rating,
         backgroundColor: 'rgba(255,99,132,0.8)',
      }],
   }

   var chart_thread_rating = new Chart(thread_rating, {
      type: 'bar',
      data: data_thread_rating
   })
</script>
<?= $this->endSection(); ?>