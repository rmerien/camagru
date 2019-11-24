function takePhoto() {
    const data = document.getElementById('canvas').toDataURL('image/jpeg');

    const strip = document.getElementById('up-strip');

    const link = document.createElement('a');
    link.href = data;
    link.innerHTML = `<img src="${data}" class='up-preview' alt="your picture" id='preview'/>`;
    strip.insertBefore(link, strip.firstChild);
}

function addElems() {
    const main = document.getElementById('up-main');

    main.innerHTML = '<video id="video"></video>';
    main.innerHTML += '<button id="snap">Take Picture</button>';
    main.innerHTML += '<canvas id="canvas"></canvas>';

    getVideo();
    document.getElementById('video').addEventListener('canplay', vidToCanvas);
    document.getElementById('snap').addEventListener('click', takePhoto);
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
        });
};

/*
** Initializes the video element. Waiting for a response to load the rest.
*/

function mainInit() {
    const main = document.getElementById('up-main');
    main.innerHTML = '<video id="video"></video>';
    main.innerHTML += '<div class="lds-dual-ring"></div>';
    
    getVideo();

    document.getElementById('video').addEventListener('canplay', addElems);
}


mainInit();



























/*



function uploadPicture() {

    var data = document.getElementById('preview').src;
    var meta = data.substr(0, data.indexOf(','));
    var ext = meta.substr(meta.indexOf('/') + 1, meta.indexOf(';') - meta.indexOf('/') - 1);
    data = data.substr(data.indexOf(',') + 1);

    var xhr = getXHR();

    xhr.open('POST', '../models/m_upload.php', true);
    
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');

    var fd = new FormData();

    fd.append('data', data);
    fd.append('ext', ext);


    console.log(xhr.status);

    xhr.onreadystatechange=function() 
    {
        if(xhr.readyState==4)
        alert("status " + xhr.status);
    }
    xhr.upload.onprogress = function(e) {
        if (e.lengthComputable) {
            var percentComplete = (e.loaded / e.total) * 100;
            console.log(percentComplete + '% uploaded');
            alert('Succesfully uploaded');
            console.log(xhr.responseText);
        }
    };
    xhr.send(fd);

};


//mainTakePic();*/