
function addElems() {
    const main = document.getElementById('up-main');

    main.innerHTML = '<video id="video"></video>';
    main.innerHTML += '<canvas id="canvas"></canvas><br>';
    main.innerHTML += '<button id="snap">Take Picture</button>';

    test = getVideo();
    alert(test);
    document.getElementById('video').addEventListener('canplay', vidToCanvas);
    document.getElementById('snap').addEventListener('click', takePhoto);
}

function urlUpload() {
    var curUrl = document.location.href;
    var newUrl = curUrl.replace('upload', 'upl');

    document.location.href = newUrl;
}

function noCamera() {
    const main = document.getElementById('up-main');
    main.innerHTML = '<h3>Could not detect a camera, please upload file manually</h3>';
    main.innerHTML = '<button id="to-up">Click Here To Upload From Files</button>';
    document.getElementById('to-up').addEventListener('click', urlUpload);
}

function vidToCanvas() {
    var vid = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');

    const width = vid.videoWidth;
    const height = vid.videoHeight;
    canvas.width = width;
    canvas.height = height;

    setInterval(function() {
        context.drawImage(vid, 0, 0, width, height);
    }, 15);
}

function getVideo() {
    
    var vid = document.getElementById('video');

    navigator.mediaDevices.getUserMedia({video: true, audio: false})
        .then(function(stream) {
            if ("srcObject" in video) {
                vid.srcObject = stream;
            } else {
                vid.src = window.URL.createObjectURL(stream);
            }
            vid.onloadedmetadata = function(e) {
                vid.play();
            };
        })
        .catch(function(err) {
            console.log(err.name + ": " + err.message);
            noCamera();
        });
};

/*
** Initializes the video element. Waiting for a response to load the rest.
*/

function mainInit() {
    document.getElementById('up-main').innerHTML = '<video id="video"></video>';
    document.getElementById('up-main').innerHTML += '<div class="lds-dual-ring"></div>';
    
    getVideo();

    document.getElementById('video').addEventListener('canplay', addElems);
}


mainInit();