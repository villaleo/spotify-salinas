<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Spotify</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css" />
</head>
<body class="bg-dark text-light">
  
  <!-- Playlist header -->
  <header class="container-fluid">
    <div class="row justify-content-center">
      <!-- Playlist image -->
      <div class="col-md-3 col-sm-4 text-center pt-4 pt-sm-3 p-sm-4 p-lg-5">
        <img class="img-thumbnail border-0 p-0" src="/images/playlist.png" alt="Playlist Cover" id="pl-cover-img" />
      </div>
      
      <!-- Playlist information -->
      <div class="col-12 col-sm my-auto pb-2 pb-sm-0 pe-sm-5">
        <small>Playlist</small>
        <h1><strong id="pl-name">On Repeat</strong></h1>
        <p id="pl-description">Songs I can't get enough of right now!</p>
        <p class="d-block text-shadow-white">
          <small><i class="bi bi-github"></i></small>
          <small>
            Created by
            <a href="https://github.com/xowin" class="text-decoration-none text-light">Christian Rodrigues</a>
          </small>
        </p>
      </div>
    </div>
    
    <!-- Action buttons -->
    <div class="p-6 bg-transparent">
      <button type="button" class="btn btn-play" aria-label="Play">
        <i class="bi bi-play-fill text-light"></i>
      </button>
      <button type="button" class="btn" id="btn-favorite" aria-label="Favorite">
        <i class="bi bi-heart text-light"></i>
      </button>
      <button type="button" class="btn" id="btn-more-options" aria-label="More options">
        <i class="bi bi-three-dots text-light"></i>
      </button>
    </div>
    
    <!-- Song information row -->
    <div class="container-fluid bg-dark text-center border-top border-bottom border-secondary py-2 full-width-row">
      <div class="row">
        <small class="col-1">#</small>
        <small class="col-4 text-start">Title</small>
        <small class="col-2 d-none d-md-block text-start">Album</small>
        <small class="col-3 text-start">Artist</small>
        <small class="col-1 px-0"><i class="bi bi-clock-fill"></i></small>
      </div>
    </div>
  </header>
  
  <!-- Tracks -->
  <main class="container-fluid bg-secondary text-center mb-5" id="tracks-list">
    <?php
    include 'songs.php';
    foreach ($songs as $index => $song) {
      echo '<div class="row song align-items-center">';
      echo '<small class="col-1">' . ($index + 1) . '</small>';
      echo '<div class="col-4 text-start d-flex align-items-center">';
      if (isset($song['cover'])) {
          echo '<img src="' . $song['cover'] . '" alt="' . $song['title'] . ' cover" style="width:50px;height:auto;margin-right:10px;">';
      } else {
          echo '<img src="images/default_cover.png" alt="Default cover" style="width:50px;height:auto;margin-right:10px;">';
      }
      echo '<span class="text-truncate">' . $song['title'] . '</span>';
      echo '</div>';
      echo '<div class="col-2 text-start text-truncate">' . $song['album'] . '</div>';
      echo '<div class="col-3 text-start text-truncate">' . $song['artist'] . '</div>';
      echo '<div class="col-1 px-0">' . $song['duration'] . '</div>';
      echo '</div>';
    }
  ?>
  </main>

  
  <!-- Media controls -->
  <footer class="footer fixed-bottom bg-dark">
    <div class="container text-center py-2">
      <button type="button" class="btn" id="btn-pb-shuffle" aria-label="Shuffle">
        <i class="bi bi-shuffle text-secondary"></i>
      </button>
      <button type="button" class="btn btn-pb-previous" aria-label="Previous">
        <i class="bi bi-skip-start-fill text-secondary"></i>
      </button>
      <button type="button" class="btn btn-play" aria-label="Play/Pause">
        <i class="bi bi-play-fill text-secondary"></i>
      </button>
      <button type="button" class="btn" id="btn-pb-next" aria-label="Next">
        <i class="bi bi-skip-end-fill text-secondary"></i>
      </button>
      <button type="button" class="btn" id="btn-pb-repeat" aria-label="Repeat">
        <i class="bi bi-arrow-repeat text-secondary"></i>
      </button>
    </div>
    
    <!-- Progress bar -->
    <div class="container pb-3">
      <div class="row align-items-center">
        <small class="col-2 col-md-1 text-end text-secondary" id="pb-elapsed-time">00:00</small>
        <div class="col progress px-0 my-auto">
          <div class="progress-bar bg-light" role="progressbar" style="width: 0%" id="pb-progress-elapsed"></div>
        </div>
        <small class="col-2 col-md-1 text-start text-secondary" id="pb-total-time">4:25</small>
      </div>
    </div>
  </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
