<?= $this->extend('layouts_maintenance/template'); ?>

<?= $this->section('content'); ?>
<!-- Background image -->
<div id="intro" class="p-5 text-center bg-image shadow-1-strong" style="background-image: url('https://mdbootstrap.com/img/new/slides/205.jpg');">
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white px-4" data-mdb-theme="dark">
        <h1 class="mb-3">Coming Soon!</h1>

        <!-- Time Counter -->
        <h3 id="time-counter" class="border border-light my-4 p-4"></h3>

        <p>We're working hard to finish the development of this site.</p>
      </div>
    </div>
  </div>
</div>
<!-- Background image -->
<?= $this->endSection(); ?>