function pageTakePic() {
    var page = document.getElementById('page');

    page.innerHTML = '<video id="video"></video>';
    page.innerHTML += '<button id="snap">SnopPhoto</button>';
    page.innerHTML += '<canvas id="canvas"></canvas>';
    
    getVideo();

    document.getElementById('video').addEventListener('canplay', paintToCanvas);
    document.getElementById('snap').addEventListener('click', takePhoto);
}

function pagePreview() {
    var page = document.getElementById('page');

    page.innerHTML = ""
    page.innerHTML = '<div id="strip"></div>';
    page.innerHTML += '<input type="button" id="up-btn" value="Upload" />';
    page.innerHTML += '<input type="button" id="re-btn" value="Retake" />';
    page.innerHTML += '<form method="post" accept-charset="utf-8" name="form1">';
    page.innerHTML += '<input name="hidden_data" id="hidden_data" type="hidden"/></form>';

    document.getElementById('re-btn').addEventListener("click", pageTakePic);
    document.getElementById('up-btn').addEventListener("click", uploadPicture);
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

function paintToCanvas() {
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
};

function uploadPicture() {

    const data = document.getElementById('preview').src;

    var xhr = getXHR('../models/m_upload.php');

    var fd = new FormData();

    fd.append("photo", data);
    var xhr = new XMLHttpRequest();
    console.log(xhr.status);
  //  xhr.open('POST', '../models/m_upload.php', true);

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

function takePhoto() {
    const data = document.getElementById('canvas').toDataURL('image/jpeg');
    pagePreview();

    const strip = document.getElementById('strip');

    const link = document.createElement('a');
    link.href = data;
    link.setAttribute('download', 'handsome');
    link.innerHTML = `<img src="${data}" alt="your picture" id='preview'/>`;
    strip.innerHTML = link.innerHTML;

};

pageTakePic();
