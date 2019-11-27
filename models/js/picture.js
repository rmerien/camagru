var _validFileExtensions = [".jpg", ".jpeg", ".png"];

function validUploadInput(input) {
    console.log(input.value);
    if (input.type == "file") {
        var fileName = input.value;
         if (fileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var extension = _validFileExtensions[j];
                if (fileName.substr(fileName.length - extension.length, extension.length).toLowerCase() == extension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                input.value = "";
                return false;
            }
        }
    }
    return true;
}

function uploadBtn() {
    var data = this.parentElement.children.pvpic.src;
    var caption = prompt('Add a caption:', '');
    while (caption.length > 200) {
        alert('Caption: maximum lenght: 200 characters')
        caption = prompt('Add a caption:', '');
    }
    if (uploadToWebsite(data, caption)) {
        this.parentElement.parentElement.removeChild(this.parentElement.parentElement);
    } else {
        alert('Failed to upload picture, try again later');
    }

}

function prevOnClick() {
    btn = this.children.upbtn;
    if (!(btn)) {
        this.innerHTML += '<button class="up-pv" name="upbtn">Upload</button>';
        btn = this.children.upbtn;
    } else {
        this.removeChild(btn);
    }
    btn.addEventListener('click', uploadBtn)
}

function takePhoto() {
    const data = document.getElementById('canvas').toDataURL('image/jpeg');

    const strip = document.getElementById('up-strip');

    const img = document.createElement('div');
    img.classList.add('up-preview');
    img.innerHTML = `<img src="${data}" name='pvpic' alt="your picture" class='preview-pic'/>`;
    img.addEventListener('click', prevOnClick);
    strip.insertBefore(img, strip.firstChild);
}

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

function noCamera() {
    const main = document.getElementById('up-main');
    main.innerHTML = '<h3>Could not detect a camera, please upload file manually</h3>';
    main.innerHTML += '<form><input type="file" name="file1" onchange="validUploadInput(this);" /></form>'
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























function uploadToWebsite(data, caption) {

    var meta = data.substr(0, data.indexOf(','));
    var ext = meta.substr(meta.indexOf('/') + 1, meta.indexOf(';') - meta.indexOf('/') - 1);
    data = data.substr(data.indexOf(',') + 1);

    var xhr = getXHR();

    xhr.open('POST', '../models/m_upload.php', true);
    
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');

    var fd = new FormData();

    fd.append('data', data);
    fd.append('ext', ext);
    fd.append('caption', caption);

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