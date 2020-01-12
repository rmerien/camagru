function bigImg() {

    let check;

    if (check = document.getElementById('preview-feed')) {
        check.parentElement.removeChild(check);
    }

    let path = this.getAttribute('data-path');
    let imgId = this.getAttribute('data-iid');
    let imgUid = this.getAttribute('data-uid');

    //var currUID = getUID();
    //console.log(currUID);

    let str = this.innerText;
    let delim = ' : ';
    let uname = str.slice(0, str.indexOf(delim));
    let caption = str.slice(str.indexOf(delim) + delim.length);
    let likeNum = document.createElement('div');
    let btnDel = document.createElement('button');
    
    likeNum.setAttribute('class', 'like-pv');
    likeNum.textContent = '👍' + getLikeAmount(imgId);
    btnDel.setAttribute('class', 'del-pv');
    btnDel.setAttribute('name', 'delbtn');
    btnDel.textContent = '❌';

    let pvDiv = document.createElement('div');
    let pvImg = document.createElement('img');
    let pvData = document.createElement('div');

    btnDel.addEventListener('click', function (e) {
        let check = document.getElementById('preview-feed');
        if(check) {
        check.parentElement.removeChild(check);
        }
    });
    pvDiv.setAttribute('id', 'preview-feed');
    pvImg.setAttribute('src', '../img/' + imgUid + '/' + path);

    pvDiv.appendChild(btnDel);
    pvDiv.appendChild(likeNum);
    pvDiv.appendChild(pvImg);
    pvDiv.appendChild(pvData);

    document.body.appendChild(pvDiv);

    //let infoPv = getComments(imgId)
}

function getComments(imgId) {

    var fd = new FormData();

    fd.append('iid', imgId);
    fd.append('action', 'comments');

    var xhr = getXHR();

    xhr.open('POST', '../models/m_preview.php', true);

    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');

    xhr.onload = function(e) {
        console.log(xhr.response);
    };
    xhr.send(fd);
}

function getLikeAmount(imgId) {

    var fd = new FormData();

    fd.append('iid', imgId);
    fd.append('action', 'likeAmount');

    var xhr = getXHR();

    xhr.open('POST', '../models/m_preview.php', true);

    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');

    xhr.onload = function(e) {
        console.log(xhr.response);
    };
    xhr.send(fd);
}

function appendArrows(pageInfo) {
    const page = document.getElementsByClassName('page')[0];
    let currPage = pageInfo[0];
    let maxPage = pageInfo[1];
    const menu = document.createElement('div');

    menu.setAttribute('id', 'arr-menu');
    if (currPage > maxPage) {
        currPage = 0;
    }
    if (currPage != 0) {
        const arrBack = document.createElement('a');
        arrBack.setAttribute('class', 'nav-arrow');
        arrBack.href = '?page=' + (currPage - 1) + '#';
        arrBack.innerText = 'Previous Page';
        menu.append(arrBack);
    }
    if (currPage != maxPage) {
        const arrForw = document.createElement('a');
        arrForw.setAttribute('class', 'nav-arrow');
        arrForw.href = '?page=' + (currPage + 1) + '#';
        arrForw.innerText = 'Next Page';
        menu.append(arrForw);
    }
    page.append(menu);
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
    console.log(img);
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
    divIMG.addEventListener('click', bigImg);
    divIMG.setAttribute('data-path', img['path']);
    divIMG.setAttribute('data-iid', img['img_id']);
    divIMG.setAttribute('data-uid', img['uid']);
    image.setAttribute('class', 'img-feed');
    image.setAttribute('src', '../img/' + img['uid'] + '/' + img['path']);

    divIMG.append(image);
    divIMG.append(desc);
    feed.append(divIMG);
}

function displayPics(jsonPics) {
    let pics = JSON.parse(jsonPics).reverse();
    let pageNum = getPageNum();
    let imgNum = 12;

    if (Math.floor(pics.length / imgNum) < pageNum) {
        pageNum = 0;
    }

    for(var i = pageNum * imgNum; (i < pageNum * imgNum + imgNum) && (i < pics.length); i++) {
        displayIMG(pics[i]);
    }

    let arr = [pageNum, Math.floor(pics.length / imgNum)];

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