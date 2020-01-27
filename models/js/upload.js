
function addElems()
{
    const page = document.getElementById('wrap-id-1');
    const main = document.createElement('div');
    const strip = document.createElement('div');
    const vid = document.getElementById('video');
    const canvas = document.createElement('canvas');
    const snap = document.createElement('button');
    let drop = document.createElement('select');
    let filters = ['No Filter', 'money', 'suit', 'hearts', 'love', '2020'];

    filters.forEach(function(e) {
        let filter = document.createElement('option');
        filter.innerText = e;
        filter.setAttribute('value', e);
        drop.appendChild(filter);
    });
    drop.setAttribute('id', 'filters-list');
    drop.setAttribute('name', 'filters');
    main.setAttribute('id', 'up-main');
    strip.setAttribute('id', 'up-strip');
    vid.removeEventListener('canplay', addElems);
    vid.addEventListener('canplay', vidToCanvas);
    canvas.setAttribute('id', 'canvas');
    snap.setAttribute('id', 'snap');
    snap.addEventListener('click', takePhoto);
    main.appendChild(canvas);
    main.appendChild(snap);
    main.appendChild(drop);
    page.appendChild(main);
    page.appendChild(strip);
    page.removeChild(document.getElementsByClassName('lds-dual-ring')[0]);
    getVideo();
}

function urlUpload()
{
    var curUrl = document.location.href;
    var newUrl = curUrl.replace('upload', 'upl');

    document.location.href = newUrl;
}

function noCamera()
{
    const page = document.getElementById('wrap-id-1');
    const noCamMessage = document.createElement('h3');
    const toLocalUp = document.createElement('button');

    noCamMessage.textContent = 'Could not detect a camera, please upload file manually';
    toLocalUp.textContent = 'Click Here To Upload From Local Disk';
    toLocalUp.setAttribute('id', 'to-up');
    toLocalUp.addEventListener('click', urlUpload);    
    page.removeChild(document.getElementsByClassName('lds-dual-ring')[0]);
    page.appendChild(noCamMessage);
    page.appendChild(toLocalUp);
}

function vidToCanvas()
{
    const drop = document.getElementById('filters-list');
    var vid = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    const width = vid.videoWidth;
    const height = vid.videoHeight;

    canvas.width = width;
    canvas.height = height;
    setInterval(function() {
        const filter = new Image();
        if (drop.selectedIndex != 0) {
            filter.src = '../img/filters/' + drop.value + '.png';
            filter.onload = function ()
            {
                context.drawImage(vid, 0, 0, width, height);
                context.drawImage(filter, 0, 0, width, height);
            }
            filter.onerror = function()
            {
                context.drawImage(vid, 0, 0, width, height);
            }
        } else {
            context.drawImage(vid, 0, 0, width, height);
        }
    }, 15);
}

function getVideo()
{    
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

function mainInit()
{
    const page = document.getElementById('wrap-id-1');
    const load = document.createElement('button');
    const vid = document.createElement('video');

    load.setAttribute('class', 'lds-dual-ring');
    vid.setAttribute('id', 'video');
    page.appendChild(load);
    page.appendChild(vid);
    vid.addEventListener('canplay', addElems);
    getVideo();
}

function drawFilter() {
    const dimensions = calculateDimensions(img);
    const height = dimensions[0];
    const width = dimensions[1];
    const filter = new Image();
    filter.src = '../img/filters/' + drop.value + '.png';
    filter.onload = function()
    {
        filter.naturalWidth = 100;
        console.dir(filter);
        console.dir(filter.naturalHeight);
        console.dir(filter.naturalWidth);
            //Draw Image On Canvas
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        context.drawImage(filter, 0, 0, width, height);
    }
}

mainInit();