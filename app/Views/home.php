<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
 <!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="<?= base_url('/image/gambar1.jpg'); ?>" style="width:100%">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="<?= base_url('/image/gambar2.jpg'); ?>" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="<?= base_url('/image/gambar3.jpg'); ?>" style="width:100%">
    <div class="text">Caption Three</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div> 
<h1>Top Threads</h1>
<table>
   <tbody>
      <?php foreach($top_thread->getResult() as $thread) : ?>
         <tr>
            <td><a href="/thread/view/<?= $thread->id_thread ?>"><?= $thread->judul; ?></a></td>
            <td>
               <?php 
               for($i = 0; $i < 5; $i++) {
                  if(($i+1) <= $thread->rating) {
                     echo '<span class="fa fa-star checked"></span>';
                  } else {
                     echo '<span class="fa fa-star"></span>';
                  }
               }
               ?>
            </td>
         </tr>
      <?php endforeach; ?>
   </tbody>
</table>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
  var slideIndex = 1;
   showSlides(slideIndex);

   function plusSlides(n) {
     showSlides(slideIndex += n);
   }

   function currentSlide(n) {
     showSlides(slideIndex = n);
   }

   function showSlides(n) {
     var i;
     var slides = document.getElementsByClassName("mySlides");
     var dots = document.getElementsByClassName("dot");
     if (n > slides.length) {slideIndex = 1}    
     if (n < 1) {slideIndex = slides.length}
     for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";  
     }
     for (i = 0; i < dots.length; i++) {
         dots[i].className = dots[i].className.replace(" active", "");
     }
     slides[slideIndex-1].style.display = "block";  
     dots[slideIndex-1].className += " active";
   }
</script>
<?= $this->endSection(); ?>