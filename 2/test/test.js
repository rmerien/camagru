var vid = document.getElementById('video');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
const strip = document.getElementById('strip');
//const snap = document.getElementById('snap');


function getVideo() {

    alert('lolsdaf');

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

getVideo(); 