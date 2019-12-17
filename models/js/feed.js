function appendArrows(pageInfo) {
    const feed = document.getElementById('feed');
    let currPage = pageInfo[0];
    let maxPage = pageInfo[1];
    const menu = document.createElement('div');

    if (currPage > maxPage) {
        currPage = 0;
    }
    if (currPage != 0) {
        const arrBack = document.createElement('a');
        arrBack.href = '#';
        arrBack.innerText = '<<';
        menu.append(arrBack);
    }
    if (currPage != maxPage) {
        const arrForw = document.createElement('a');
        arrForw.href = '?page=' + (currPage + 1) + '#';
        arrForw.innerText = '>>';
        menu.append(arrForw);
    }
    feed.append(menu);
    console.log(currPage + 'asdfasdf' + maxPage);
}

function getPageNum() {
    let url = new URL(document.location);
    let page = parseInt(url.searchParams.get('page'));
    if (page) {
        return page;
    } else {
        return 0;
    }
}

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
    let pageNum = getPageNum();
    let imgNum = 12;

    if (Math.floor(pics.length / imgNum) < pageNum) {
        pageNum = 0;
    }

    for(var i = pageNum * imgNum; (i < pageNum * imgNum + imgNum) && (i < pics.length); i++) {
        displayIMG(pics[i]);
    }

    let arr = [pageNum, Math.floor(pics.length / imgNum)];

    console.log(arr);

    return arr;
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
                let pageInfo = displayPics(xhr.response);
                appendArrows(pageInfo);
        };
        xhr.send(fd);
    }
}

initFeed();