<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trash Taste Fan Site</title>
  <link rel="shortcut icon" href="./favicon.jpg" type="image/svg+xml">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="top">
  <header class="active" data-header>
    <div class="container">
      <div class="overlay" data-overlay></div>
      <a href="#" class="logo">
        <img src="./assets/images/Trash_Taste_Logoo.png" alt="Trashy logo">
      </a>
      <button class="nav-toggle-btn" data-nav-toggle-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>
      <nav class="navbar" data-navbar>
        <ul class="navbar-list">
          <li class="navbar-item">
            <a href="#hero" class="navbar-link">Home</a>
          </li>
          <li class="navbar-item">
            <a href="#podcast" class="navbar-link">Episodes</a>
          </li>
          <li class="navbar-item">
            <a href="#hosts" class="navbar-link">Hosts</a>
          </li>
          <li class="navbar-item">
            <a href="#contact" class="navbar-link">Contact</a>
          </li>
        </ul>
        <div class="navbar-actions">
          <button class="navbar-btn" id="logout-btn">
            <ion-icon name="log-out-outline"></ion-icon>
          </button>
          <button class="navbar-btn" id="open-tab-btn">
            <ion-icon name="cart-outline"></ion-icon>
          </button>
          <a href="settings.php" class="btn">
            <ion-icon name="person-circle-outline"></ion-icon>
            <span>User Settings</span>
          </a>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <article class="container">
      <!-- 
      - #HERO
      -->
      <section class="hero" id="hero">
        <div class="hero-content">
          <img src="./assets/images/hero-title1.png" alt="Podcast" class="hero-title" />
          <p class="hero-text">
            Trash Taste (Japanese: トラッシュ・テイスト) is a weekly audio and video podcast hosted by Joey Bizinger, Garnt
            Maneetapho, and Connor Colquhoun – three Tokyo-based content creators primarily focusing on anime and
            Japanese pop culture. The podcast generally discusses Japanese culture and life in Japan.
          </p>
          <div class="hero-btn-group">
            <button class="btn btn-primary listen-now-btn">
              <ion-icon name="headset"></ion-icon>
              <span>Be a Member</span>
              <a href="https://www.patreon.com/trashtaste"></a>
            </button>
            <div class="btn-link-wrapper">
              <p class="btn-title">Subscribe On:</p>
              <a href="https://www.youtube.com/@TrashTaste" class="btn-link">
                <ion-icon name="logo-youtube"></ion-icon><span>YouTube</span>
              </a>
              <a href="https://open.spotify.com/show/6i9SWtZPb30xVXWVHSKCqq?si=3fab026a639540b3" class="btn-link">
                <i class="fa fa-spotify"></i><span>Spotify</span>
              </a>
            </div>
          </div>
        </div>
        <div class="hero-banner"></div>
      </section>

      <!-- 
  - #HOSTS
-->
      <section class="hosts" id="hosts">
        <h2>Meet the Hosts</h2>
        <div class="slideshow-container">
          <div class="mySlides fade">
            <img src="./assets/images/Gigguk.jpg" class="host-img" alt="Gigguk" />
            <div class="text">
              <h3>Gigguk</h3>
              <p>Garnt, known online as Gigguk, is a prominent figure in the anime community. He is well-known for his
                insightful and humorous commentary on anime culture, often incorporating witty humor and sharp critiques
                in his videos.</p>
              <a href="https://www.youtube.com/channel/UC7dF9qfBMXrSlaaFFDvV_Yg" target="_blank"
                class="youtube-link">Watch on YouTube</a>
            </div>
          </div>

          <div class="mySlides fade">
            <img src="./assets/images/Joey.jpg" class="host-img" alt="Joey" />
            <div class="text">
              <h3>The Anime Man (Joey)</h3>
              <p>Joey, also known as The Anime Man, is a versatile content creator with a deep passion for anime and
                Japanese culture. His channel features a wide range of content including reviews, interviews, and vlogs
                that explore various aspects of anime and manga.
              </p>
              <a href="https://www.youtube.com/user/TheAn1meMan" target="_blank" class="youtube-link">Watch on
                YouTube</a>
            </div>
          </div>

          <div class="mySlides fade">
            <img src="./assets/images/Connor.jpg" class="host-img" alt="Connor" />
            <div class="text">
              <h3>CDawgVA (Connor)</h3>
              <p>Connor, known as CDawgVA, is a popular YouTuber and voice actor. His content ranges from entertaining
                voice-over challenges to immersive travel vlogs, often showcasing his charismatic personality and
                comedic flair.</p>
              <a href="https://www.youtube.com/@CDawgVA" target="_blank" class="youtube-link">Watch on YouTube</a>
            </div>
          </div>

          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>
      </section>


      <!-- 
        - #PODCAST
      -->
      <section class="podcast" id="podcast">
        <h2>Latest Trash Taste Highlights</h2>
        <div id="podcast-container"></div>
      </section>
      <!-- 
  - #FOOTER
  -->
      <footer>
        <div class="footer-top" id="contact">
          <div class="container">
            <div class="footer-brand">
              <a href="#" class="logo">
                <img src="Disclaimer.png" alt="Trash Taste Logo" class="disclaimer" />
              </a>
              <p class="footer-text">
                This is not the official website of the Trash Taste
                Podcast. This is just a project for our Web Systems and Technologies
                subject.
              </p>
            </div>
            <ul class="footer-list">
              <li>
                <p class="footer-link-title">Contact Us On:</p>
              </li>
              <li>
                <a href="mailto:hello@micro.com" class="footer-link">outdoorbin07@gmail.com</a>
              </li>
              <li>
                <a href="tel:+0123454678" class="footer-link">+639362087855</a>
              </li>
            </ul>
            <div class="social-list-box">
              <p class="social-title">Follow Us On:</p>
              <ul class="social-list">
                <li>
                  <a href="https://www.facebook.com/profile.php?id=61560746332883" class="social-link">
                    <ion-icon name="logo-facebook"></ion-icon>
                  </a>
                </li>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="container">
            <p class="copyright">
              &copy; 2024 <a href="#">JohJoeVince</a>. All Rights Reserved
            </p>
          </div>
        </div>
      </footer>

      <!-- 
  - #GO TO TOP
  -->
      <a href="#top" class="go-top" data-go-top>
        <ion-icon name="chevron-up-outline"></ion-icon>
      </a>

      <!-- Popup -->
      <div id="popup" class="popup">
        <div class="popup-content">
          <span class="close-btn">&times;</span>
          <h3>Choose where to listen</h3>
          <a href="https://www.patreon.com/trashtaste" target="_blank" class="btn btn-primary"><ion-icon
              name="person-add-outline"></ion-icon>Patreon</a>

          <!-- 
  - custom js link
  -->
          <script src="./assets/js/script.js"></script>

          <!-- 
  - ionicon link
  -->
          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>