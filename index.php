<?php
// Halaman Ucapan Ulang Tahun Interaktif
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Selamat Ulang Tahun!</title>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Baloo+2&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      background-image: url('https://i.pinimg.com/736x/0a/87/bd/0a87bde1b9d52fa92015c97ffd46c0a4.jpg');
      background-size: cover;
      background-position: center;
      color: #333;
      overflow: hidden;
      transition: background-image 1s ease;
      font-family: 'Baloo 2', cursive;
    }
    .scroll-enabled {
      overflow: auto;
    }
    .section {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 2rem;
      text-align: center;
      transition: all 0.6s ease-in-out;
      position: relative;
    }
    .section:nth-child(even) {
      flex-direction: row;
      justify-content: space-around;
    }
    .section:nth-child(even) img {
      width: 220px;
      max-width: 90%;
      border-radius: 20px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    .section:nth-child(even) .desc {
      max-width: 400px;
      padding: 1rem;
    }
    h1, h2 {
      margin-bottom: 1rem;
      font-family: 'Pacifico', cursive;
      color: #b83b5e;
    }
    p {
      font-size: 1.1rem;
      color: #4b2e2e;
    }
    .closing {
      background-color: rgba(255, 224, 224, 0.9);
      padding: 4rem 2rem;
      font-size: 1.5rem;
      color: #602020;
      font-weight: bold;
    }
    @media (max-width: 768px) {
      .section:nth-child(even) {
        flex-direction: column;
      }
      .section:nth-child(even) .desc {
        text-align: center;
      }
    }
    .envelope {
      font-size: 3.5rem;
      cursor: pointer;
      transition: transform 1s ease;
      z-index: 2;
    }
    .open .envelope {
      transform: scale(0);
    }
    .intro-text, .tap-text {
      transition: opacity 0.6s ease;
      z-index: 2;
    }
    .hide-text .intro-text,
    .hide-text .tap-text {
      opacity: 0;
    }
    .birthday-message {
      display: none;
      animation: fadeIn 1s ease forwards;
      z-index: 2;
    }
    .show-message .birthday-message {
      display: block;
      animation: zoomIn 1s ease forwards;
    }
    .intro-text {
      margin-bottom: 20px;
      font-size: 2rem;
      color: #ff5e78;
      font-weight: bold;
    }
    .tap-text {
      margin-top: 20px;
      font-size: 1.2rem;
      color: #ff85a1;
      font-style: italic;
    }
    #particles {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      overflow: hidden;
      z-index: 1;
    }
    .heart {
      position: absolute;
      color: pink;
      animation: float 6s linear infinite;
      font-size: 1.2rem;
      pointer-events: none;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes zoomIn {
      from { transform: scale(0.5); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }
    @keyframes float {
      0% { transform: translateY(0) rotate(0deg); opacity: 1; }
      100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
    }
    .popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0);
      background: #fff0f5;
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.3);
      text-align: center;
      transition: transform 0.5s ease, opacity 0.5s ease;
      z-index: 10;
      opacity: 0;
    }
    .popup.show {
      transform: translate(-50%, -50%) scale(1);
      opacity: 1;
    }
    .popup h1 {
      font-size: 2.5rem;
    }
    .popup p {
      font-size: 2.5rem;
      font-weight: bold;
      color: #c2185b;
    }
    .popup button {
      margin-top: 1rem;
      padding: 0.5rem 1rem;
      font-size: 1rem;
      background: #ff69b4;
      color: white;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }
    .gallery {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1.5rem;
      padding: 2rem;
    }
    .gallery img {
      width: 200px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body id="body">
  
  <div id="particles"></div>
  <section class="section" id="intro">
    <div class="intro-text">Haloo dedek iyeh</div>
    <div class="envelope" onclick="openEnvelope()">💌</div>
    <div class="tap-text">Pencet amplopnya ya!</div>
    <div class="birthday-message">
      <h1>Selamat Ulang Tahun!</h1>
      <p style="font-size: 2.5rem;">Resti Kusumawati</p>
    </div>
  </section>

  <div class="popup" id="popup">
    <h1>Selamat Ulang Tahun!</h1>
    <p>Resti Kusumawati</p>
    <button onclick="closePopup()">Okay</button>
  </div>

  <section class="section">
    <img src="https://i.imgur.com/kOEzVvJ.jpeg" alt="Kenangan Manis Resti" 
         style="width: 100%; max-width: 800px; height: auto; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.2); display: block; margin: 0 auto;">
    <div class="desc" style="text-align: center;">
      <h2>Haloo Adeekk</h2>
      <p>pasti abis sebel yaa
      hehehe maaf yaa, sengaja biar sebel dulu baru happy
      celamat ulang tahun adeekk, yeayy finally legall ya.</p>
    </div>
  </section>
  <section class="section">
    <img src="https://i.imgur.com/gmPdjAv.jpeg" alt="Kenangan Favorit" style="width: 180px; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
    <div class="desc">
      <h2>🌸✨ Happy Sweet Seventeen! ✨🌸</h2>
      <p>Selamat ulang tahun yang ke-17!
      Semoga di usia baru ini, adek semakin bijak, dewasa, dan penuh semangat menjalani hari-hari.
      Semoga semua impian adek satu per satu terwujud, dan hidup adek selalu dipenuhi cinta, tawa, dan kebahagiaan.

      Hari ini adalah milikmu — nikmati setiap momennya, karena kamu pantas mendapat yang terbaik. 💖🎉
      Have a magical birthday, and an even more amazing year ahead!</p>
    </div>
  </section>

  <section class="section">
    <img src="https://i.imgur.com/E92fSie.jpeg" alt="Foto Ulang Tahun">
    <div class="desc">
      <h2>Ceritanya ini Cake</h2>
      <p>Sementara pake cake dari pinterest dulu ya adekk, jangan lupa berdoa sebelum tiup lilinya yaa!</p>
    </div>
  </section>

  <section class="section" style="text-align: center; padding: 20px;">
    <img src="https://i.imgur.com/IFuSeS4.jpeg" alt="Foto Bahagia" 
         style="max-width: 600px; width: 90%; height: auto; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
    <div class="desc" style="margin-top: 16px;">
      <h2 style="color: #333;">Senyumanmu</h2>
      <p style="color: #555; font-size: 16px; max-width: 600px; margin: 0 auto;">
        Senyumanmu selalu berhasil menceriakan hari-hari orang di sekitarmu.  
        Tetaplah menjadi dirimu yang luar biasa!
      </p>
    </div>
  </section>
  <section class="section">
    <img src="https://i.imgur.com/kFP5Dvo.jpeg" alt="Hadiah Spesial">
    <div class="desc">
      <h2>Selanjutnyaa..</h2>
      <p>Adek mau hadiah apa? aku bingung banget soal hadiahnya orang ini aja aku buatnya juga mepet hehehe</p>
    </div>
  </section>

  <section class="section">
    <h2>Ayo Sering Foto Lagi</h2>
    <div class="gallery">
      <img src="https://i.imgur.com/7OtdyMN.png" alt="Foto 1">
      <img src="https://i.imgur.com/u50P6oZ.png" alt="Foto 2">
      <img src="https://i.imgur.com/X48rPcU.png" alt="Foto 3">
      <img src="https://i.imgur.com/ruqurA5.png" alt="Foto 4">
    </div>
  </section>

  <section class="section closing">
    <p>Udahh dulu yaa, capee ngodingnyaa...</p>
  </section>

  <script>
    function openEnvelope() {
      const intro = document.getElementById('intro');
      const body = document.getElementById('body');
      const popup = document.getElementById('popup');

      intro.classList.add('open');
      intro.classList.add('hide-text');

      setTimeout(() => {
        popup.classList.add('show');
      }, 1000);
    }

    function closePopup() {
      const popup = document.getElementById('popup');
      const body = document.getElementById('body');

      popup.classList.remove('show');
      body.classList.add('scroll-enabled');
      window.scrollTo({ top: window.innerHeight, behavior: 'smooth' });
    }

    function createHeart() {
      const heart = document.createElement('div');
      heart.classList.add('heart');
      heart.innerText = '💖';
      heart.style.left = Math.random() * 100 + 'vw';
      heart.style.fontSize = (Math.random() * 2 + 1) + 'rem';
      heart.style.animationDuration = (Math.random() * 3 + 3) + 's';
      document.getElementById('particles').appendChild(heart);

      setTimeout(() => heart.remove(), 6000);
    }
    setInterval(createHeart, 300);
  </script>
  <audio autoplay loop id="bgMusic">
    <source src="https://media.vocaroo.com/mp3/your-audio-id" type="audio/mpeg">
    Browser kamu tidak mendukung elemen audio.
  </audio>

  <script>
    window.addEventListener('DOMContentLoaded', function () {
      const audio = document.getElementById('bgMusic');
      audio.play().catch(() => {
        console.log("Autoplay diblokir. Pengguna harus berinteraksi dulu.");
      });
    });
  </script>
</body>
</html>
