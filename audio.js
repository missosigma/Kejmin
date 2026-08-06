//audio unlock helper for any user interaction and back-navigation resumes
const bgmusic = document.getElementById('bg-music');
const battlemusic = document.getElementById('battle-music');
let audioUnlocked = false;

function playAudioIfReady(audio) {
  if (!audio) {
    return;
  }
  if (audio.paused) {
    audio.play().catch(error => {
      console.log('Audio play blocked or unavailable:', error);
    });
  }
}

function unlockAudio() {
  if (audioUnlocked) {
    return;
  }
  audioUnlocked = true;

  playAudioIfReady(bgmusic);
  playAudioIfReady(battlemusic);
}

const unlockEvents = ['click', 'keydown', 'touchstart', 'pointerdown'];
unlockEvents.forEach(eventName => {
  document.addEventListener(eventName, unlockAudio, { once: true, passive: true });
});

window.addEventListener('pageshow', event => {
  if (event.persisted || audioUnlocked) {
    playAudioIfReady(bgmusic);
    playAudioIfReady(battlemusic);
  }
});

window.addEventListener('visibilitychange', () => {
  if (document.visibilityState === 'visible' && audioUnlocked) {
    playAudioIfReady(bgmusic);
    playAudioIfReady(battlemusic);
  }
});
