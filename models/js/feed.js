function displayPics(jsonPics) {
    console.dir(jsonPics);
}

function initFeed() {
    var typingTimer;
    var loadImagesInterval = 500;
    var input = document.getElementById('searchbar');

    loadImages();

    input.addEventListener('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(loadImages, loadImagesInterval);
    });

    input.addEventListener('keydown', function (e) {
        console.log(e);
        clearTimeout(typingTimer);
    });

    function loadImages () {
        let uname = document.getElementById('searchbar').value;



        if (!uname) {
            uname = "";
        }

        var fd = new FormData();

        fd.append('uname', uname);
        
        var xhr = getXHR();

        xhr.open('POST', '../models/m_feed.php', true);

        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');

        xhr.onload = function(e) {
                displayPics(xhr.response);
        };
        xhr.send(fd);
    }
}
document.addEventListener('readystatechange', initFeed());