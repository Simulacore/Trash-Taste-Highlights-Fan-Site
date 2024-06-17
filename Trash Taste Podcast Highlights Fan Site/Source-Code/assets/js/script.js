'use strict';
//logout
document.getElementById('logout-btn').addEventListener('click', function() {
  window.location.href = 'logout.php';
});
//end logout

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
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




document.getElementById('open-tab-btn').onclick = function() {
  window.open('https://trashtastestore.com/', '_blank');
};

// NAVBAR
const nav = document.querySelector('[data-navbar]');
const navLinks = document.querySelectorAll('.navbar-link');
const overlay = document.querySelector('[data-overlay]');
const navToggleBtn = document.querySelector('[data-nav-toggle-btn]');
const goTopBtn = document.querySelector('[data-go-top]');
const header = document.querySelector('[data-header]');

// function to close navbar
const closeNav = function () {
    nav.classList.remove('active');
    navToggleBtn.classList.remove('active');
    overlay.classList.remove('active');
}

// Add event listener to nav toggle button
navToggleBtn.addEventListener('click', function () {
    nav.classList.toggle('active');
    this.classList.toggle('active');
    overlay.classList.toggle('active');
});

// Add event listener to each nav link
navLinks.forEach((navLink) => navLink.addEventListener('click', closeNav));

// Add event listener to overlay
overlay.addEventListener('click', closeNav);

// Add event listener to window scroll for header & goTopBtn
window.addEventListener('scroll', function () {
    window.scrollY >= 10 ? header.classList.add('active') : header.classList.remove('active');
    window.scrollY >= 500 ? goTopBtn.classList.add('active') : goTopBtn.classList.remove('active');
});

// YouTube API call
const podcastContainer = document.getElementById('podcast-container');

async function fetchPodcastEpisodes() {
    const response = await fetch('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=5&playlistId=PLFEYLn4Z4e2Q6vRtVxLtw-bOUEFe6FYYW&key=YOUR_API_KEY');
    const data = await response.json();

    data.items.forEach(item => {
        const videoId = item.snippet.resourceId.videoId;
        const videoTitle = item.snippet.title;
        const videoThumbnail = item.snippet.thumbnails.high.url;

        const podcastElement = document.createElement('div');
        podcastElement.classList.add('podcast-item');
        podcastElement.innerHTML = `
            <img src="${videoThumbnail}" alt="${videoTitle}" class="podcast-thumbnail">
            <h3 class="podcast-title">${videoTitle}</h3>
            <a href="https://www.youtube.com/watch?v=${videoId}" target="_blank" class="btn btn-secondary">Watch Now</a>
        `;
        podcastContainer.appendChild(podcastElement);
    });
}

fetchPodcastEpisodes();

// Popup script
const listenNowBtn = document.querySelector('.listen-now-btn');
const popup = document.getElementById('popup');
const closeBtn = document.querySelector('.close-btn');

listenNowBtn.addEventListener('click', () => {
    popup.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    popup.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target == popup) {
        popup.style.display = 'none';
    }
});

//youtube api again

/**
 * youtube api
 */



window.addEventListener("scroll", function () {

  window.scrollY >= 200 ? goTopBtn.classList.add("active") : goTopBtn.classList.remove("active");

});

document.addEventListener('DOMContentLoaded', function () {
  console.log('DOM fully loaded and parsed');
  const apiKey = 'AIzaSyAFVRk1FmqyUPW0D__yI3wj9Tly0ku6ULc';
  const channelId = 'UCry1ZVKLslbZXuQgsf-3TXg'; // Replace with the actual channel ID
  const maxResults = 6; // Number of videos to fetch

  fetch(`https://www.googleapis.com/youtube/v3/search?key=${apiKey}&channelId=${channelId}&part=snippet,id&order=date&maxResults=${maxResults}`)
    .then(response => {
      console.log('Response received from YouTube API');
      return response.json();
    })
    .then(data => {
      console.log('Data parsed from response:', data);
      const videos = data.items;
      const container = document.getElementById('podcast-container');
      if (container) {
        videos.forEach(video => {
          const videoId = video.id.videoId;
          const videoTitle = video.snippet.title;
          const videoElement = document.createElement('div');
          videoElement.className = 'video';
          videoElement.innerHTML = `
            <h3>${videoTitle}</h3>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/${videoId}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          `;
          container.appendChild(videoElement);
        });
      } else {
        console.error('Container element not found');
      }
    })
    .catch(error => console.error('Error fetching data:', error));    
});




