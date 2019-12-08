
function addElems() {
    const main = document.getElementById('up-main');
    const canvas = document.createElement('canvas');
    const snap = document.createElement('button');

    canvas.setAttribute('id', 'canvas');
    snap.setAttribute('id', 'snap');
    alert('we here');
    snap.textContent = 'Take Picture';
    snap.addEventListener('click', takePhoto);

    main.appendChild(canvas);
    main.appendChild(snap);

    getVideo();
}

function urlUpload() {
    var curUrl = document.location.href;
    var newUrl = curUrl.replace('upload', 'upl');

    document.location.href = newUrl;
}

function noCamera() {
    const main = document.getElementById('up-main');
    const noCamMessage = document.createElement('h3');
    const toLocalUp = document.createElement('button');

    noCamMessage.textContent = 'Could not detect a camera, please upload file manually';
    toLocalUp.textContent = 'Click Here To Upload From Local Disk';
    toLocalUp.setAttribute('id', 'to-up');
    toLocalUp.addEventListener('click', urlUpload);

    main.appendChild(noCamMessage);
    main.appendChild(toLocalUp);
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
            console.error(err.name + ": " + err.message);
            noCamera();
        });
};

/*
** Initializes the video element. Waiting for a response to load the rest.
*/

function mainInit() {
    const page = document.getElementById('wrap-id-1');
    const main = document.createElement('div');
    const strip = document.createElement('div');

    const load = document.createElement('button');
    const vid = document.createElement('video');

    main.setAttribute('id', 'up-main');
    strip.setAttribute('id', 'up-strip');

    load.setAttribute('class', 'lds-dual-ring');
    vid.setAttribute('id', 'video');

    page.appendChild(load);
    page.appendChild(vid);
    
    document.getElementById('up-main').appendChild(vid);

    vid.addEventListener('canplay', addElems);
    
    getVideo();

}


mainInit();