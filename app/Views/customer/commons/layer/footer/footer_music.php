<script>
    var musicCheckbox = document.getElementById("music-checkbox");
    var musicContent = document.getElementById("music-content");

    updateUIMusicContent();
    musicCheckbox.addEventListener('change', function() {
        updateUIMusicContent();
    })

    function updateUIMusicContent() {
        musicContent.hidden = musicCheckbox.checked ? false : true;
    }

    var musicPlay = document.getElementById('music-play');

    var audioList = []; // Array to store Audio objects
    var base_url = <?= json_encode(base_url('')); ?>;

    function playMusicButton(audioFilePath, imageElementId) {
        var newAudioFilePath = base_url + '/assets/music/' + audioFilePath;

        // Pause all other playing audio files
        audioList.forEach(audio => {
            if (audio !== null && !audio.paused && audio.src !== newAudioFilePath) {
                audio.pause();
                updateImage(imageElementId, 'pause');
            }
        });

        // Check if the audio file is already in the list
        var audio = audioList.find(a => a !== null && a.src === newAudioFilePath);

        if (!audio) {
            // If not, create a new Audio object and add it to the list
            audio = new Audio(newAudioFilePath);
            audioList.push(audio);
        } else {
            updateImage(imageElementId, 'pause');
        }

        if (audio.paused) {
            audio.play()
                .then(() => {
                    console.log('Audio playback started.');
                    updateImage(imageElementId, 'play');
                })
                .catch(error => {
                    console.error('Error starting audio playback: ', error);
                });
        } else {
            audio.pause();
            updateImage(imageElementId, 'pause');
        }
    }

    function updateImage(imageElementId, state) {
        var imageElement = document.getElementById(imageElementId);

        if (state === 'play') {
            // Change the image source for the playing state
            imageElement.src = base_url + '/assets/images/icon/pause-button.png';
        } else {
            // Change the image source for the paused state
            imageElement.src = base_url + '/assets/images/icon/play-button.png';
        }
    }

    // Add music
    function addMusic() {
        document.getElementById("myFile").click();
    }

    // Choose main music
    function chooseMainMusic() {

    }
</script>