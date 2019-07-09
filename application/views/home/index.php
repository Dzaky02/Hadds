<style type='text/css'>
#info {
display: block;
position: relative;
margin: 0px auto;
width: 50%;
padding: 10px;
border: none;
border-radius: 3px;
font-size: 12px;
text-align: center;
color: #222;
background: #fff;
}
</style>
<!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid img-fluid d-flex align-items-center justify-content-center parallax--bg">
    <div class="container">
      <h1 class="display-4">Selamat Datang di website kami</h1>
      <p class="lead">Website penyedia informasi mengenai tingkat keramaian di gedung Fakultas Ilmu Terapan.</p>
      <a class="page-scroll" href="#definition">
        <div class="row d-flex align=items-center justify-content-center indicator-helper">
          <div class="d-flex align=items-center justify-content-center sroll-down-indicator">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </a>
    </div>
  </div>
<!-- Akhir Jumbotron -->

<!-- Tentang Hadds Section -->
  <section id="definition" class="definition-section">
    <div class="container">
      <div class="row align-items-center py-4 ml-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="<?= base_url(); ?>assets/img/background/lobby-fit.jpg" alt="image">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text">
            <h4>Apa itu HADDS ?</h4>
            <p class="text-black-50 mb-0">
            Hadds merupakan website yang menampilkan data tingkat keramaian pada gedung Fakultas Ilmu Terapan Telkom University. Tingkat keramaian tersebut ditampilkan dalam bentuk heatmap pada peta <em>indoor</em>, guna membantu analisa untuk tata letak media informasi maupun iklan.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- Akhir Section Tentang Hadds -->

<!-- Kegunaan Section -->
  <section id="purpose" class="purpose-section parallax--bg">
    <div class="container vertical-align">
      <div class="row purpose-row align-items-center text-center px-5">
        <div class="col-md mx-3 my-2">
          <img src="<?= base_url(); ?>assets/img/icon/icon_idea.png" class="rounded icon-purpose mx-auto d-block" alt="...">
          <p class="text-black-50 mb-0 mt-3">Membantu proses analisa tingkat keramaian FIT pada tiap lantai</p>
        </div>
        <div class="col-md mx-3 my-2">
          <img src="<?= base_url(); ?>assets/img/icon/icon_place.png" class="rounded icon-purpose mx-auto d-block" alt="...">
          <p class="text-black-50 mb-0 mt-3">Medapat menjadi refrensi untuk pemasagan media informasi yang strategis</p>
        </div>
        <div class="col-md mx-3 my-2">
          <img src="<?= base_url(); ?>assets/img/icon/icon_watch.png" class="rounded icon-purpose mx-auto d-block" alt="...">
          <p class="text-black-50 mb-0 mt-3">Heatmap yang di tampilkan dapat disesuaikan dengan waktu yang diinginkan</p>
        </div>
      </div>
    </div>
  </section>
<!-- Akhir Section Kegunaan -->

<!-- TODO: Heatmap Filter Section -->
  <section id="heatmap" class="heatmap-section">
    <div class="container justify-content-center mt-3">
      <form>
        <div class="form-row justify-content-center">
          <div class="form-group col-md-5">
            <label for="inputFloor">Pilih Lantai</label>
            <select class="form-control" id="inputFloor" name="inputFloor">
              <?php foreach( $floors as $floor ) : ?>
                <option value="<?= $floor['id_floor'] ?>"><?= $floor['floor_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-md-5">
            <label for="inputDateRange">Rentang Tanggal</label>
            <input type="text" class="form-control" id="inputDateRange" name="inputDateRange" placeholder="rentang tanggal" >
          </div>
          <div class="form-group col-md-2 d-flex justify-content-center mb-0">
            <div class="form-check align-self-center">
              <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Lihat Rekomendasi
              </label>
            </div>
          </div>
          <!-- <div class="from-group col-md-1 d-flex justify-content-center btn-grup">
            <button type="button" name="submitFilter" id="submitFilter" class="btn btn-primary align-self-center mr-2">Filter</button>
            <button type="reset" name="resetFilter" id="resetFilter" class="btn btn-outline-dark align-self-center ml-2">Reset</button>
          </div> -->
        </div>
      </form>
    </div>
  </section>
  <section id="mapbox" class="maps-section">
    <div class="map" id="map">
      <nav id="menu-map"></nav>
    </div>
    <pre id='info'></pre>
  </section>
<!-- Akhir Section Heatmap Filter -->

<!-- Team Section -->
  <section id="team" class="team-section parallax--bg">

    <div class="container">
      <div class="col text-center">
        <h2>Tentang Kami</h2>
      </div>
    </div>

    <div class="row align-items-center justify-content-center py-5">
      <!-- Swiper -->
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card">
              <img src="<?= base_url(); ?>assets/img/team/dzaky.jpg" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="mb-0" style="font-weight: 700">Ahmad Dzaky Abrori</h5>
                <p class="mb-0">Back End Developer</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img src="<?= base_url(); ?>assets/img/team/pramana.png" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="mb-0" style="font-weight: 700">Pramana Putra</h5>
                <p class="mb-0">Front End Developer</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img src="<?= base_url(); ?>assets/img/team/pak_fathah.jpg" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="mb-0" style="font-weight: 700">Fat’hah Noor Prawita, ST., MT.</h5>
                <p class="mb-0">Dosen Pembimbing</p>
              </div>
            </div>
          </div> 
        </div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-pagination"></div> -->
      </div>
    </div>
  </section>
<!-- Akhir Section Team -->
<!-- Footer -->
<section id="footer">
    <div class="row justify-content-md-center">
      <div class="col d-flex align-items-center justify-content-center">
        <div class="float-left ml-3">&copy; Two Pilot</div>&nbsp;&nbsp;&nbsp; <img src="<?= base_url(); ?>assets/img/icon/two_pilot.png" style="height:30px;potition:fixed;">
      </div>
    </div>
</section>