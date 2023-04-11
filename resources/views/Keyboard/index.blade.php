<!DOCTYPE html>
<html>
<head> 
    <title>Keyboard</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://unpkg.com/tone"></script>
    <script src="{{ asset('js/qwerty-hancock.min.js') }}"></script>
</head>
<body>
    <h1>Keyboard Of Truth</h1>
    <div id="container" class="container">
    <div id="bulk" class="bulk"></div>
    <div id="keyboard" class="center">
    <script>
        // Initialize Tone.js
        Tone.start();

        // Create an array of the different instrument types
        const instruments = [
            {
                type: 'Please',
                notesPath: 'sounds/Please/',
            },
            {
                type: 'Hire',
                notesPath: 'sounds/Hire/',
            },
            {
                type: 'Me',
                notesPath: 'sounds/Me/',
            },
        ];

        // Initialize the current instrument index
        let currentInstrumentIndex = 0;

        // Create a function to get the current instrument object
        function getCurrentInstrument() {
            return instruments[currentInstrumentIndex];
        }

        // Create a function to cycle to the next instrument
        function cycleInstrument() {
            currentInstrumentIndex = (currentInstrumentIndex + 1) % instruments.length;
        }

        // Create audio element from note and instrument value
        function playSound(note, instrument) {
            const sound = new Audio(`${instrument.notesPath}${note.replace('#', '%23')}.wav`);
            sound.play();
        }
        

        // create the keyboard UI
        var keyboardUI = new QwertyHancock({
            id: 'keyboard',
            width: 600,
            height: 150,
            octaves: 1,
            startNote: 'C4',
            whiteNotesColour: 'white',
            blackNotesColour: 'black',
            hoverColour: '#f3e939'
        });


        // bind keyboard events to trigger the sampler
        keyboardUI.keyDown = function(note, frequency) {
            instrument = getCurrentInstrument(); 
            playSound(note, instrument);
        }
        keyboardUI.keyUp = function(note, frequency) {
            cycleInstrument();
            console.log(`Current instrument: ${getCurrentInstrument().type}`);
        }

    </script>
    </div>
    </div>
    <div class="info">
        <a href="https://github.com/Scorpoll23/resume/tree/main">Look at my resume!</a>
    </div>
</body>
</html>
