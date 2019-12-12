function sanitize($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "â€”", "â€“", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}

function displayPics(jsonPics) {
    console.log(jsonPics);
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

        xhr.responseType = 'json';

        xhr.open('POST', '../models/m_feed.php?u='+uname, true);

        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                var percentComplete = (e.loaded / e.total) * 100;
                console.log(percentComplete + '% uploaded');
                displayPics(xhr.responseText);
            }
        };
        xhr.send(fd);
    }
}
document.addEventListener('readystatechange', initFeed());