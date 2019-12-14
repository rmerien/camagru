function displayIMG(img) {
    const feed = document.getElementById('feed');
    let divIMG = document.createElement('div');
    let image = document.createElement('img');
    let desc = document.createElement('span');
    let name = document.createElement('strong');
    let caption;

    if (img['caption'].length < 100) {
        caption = document.createTextNode(' : ' + img['caption']);
    } else {
        caption = document.createTextNode(' : ' + img['caption'].substring(0, 97) + '...');
    }


    name.setAttribute('style', 'font-weight:bold');
    name.innerText = img['username'];
    desc.append(name);
    desc.append(caption);
    desc.setAttribute('class', 'feed-desc');
    divIMG.setAttribute('class', 'elem-feed');
    image.setAttribute('class', 'img-feed');
    image.setAttribute('src', '../img/' + img['uid'] + '/' + img['path'])

    divIMG.append(image);
    divIMG.append(desc);
    feed.append(divIMG);
}

function displayPics(jsonPics) {
    let pics = JSON.parse(jsonPics).reverse();
    console.dir(pics);
    let pageNum = 0;

    for(var i = 0; (i < pageNum * 9 + 9) && (i < pics.length); i++) {
        displayIMG(pics[i]);
    }
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

initFeed();