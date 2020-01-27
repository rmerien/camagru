function deleteImg() {
    if (confirm('Are you sure you want to delete this image?')) {
        const iid = document.getElementById('img-wrap').getAttribute('data-iid');
        var fd = new FormData();
        fd.append('iid', iid);
        fd.append('action', 'delImage');
        var xhr = getXHR();
        xhr.open('POST', '../models/m_preview.php', true);
        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
        xhr.onload = function(e) {
            console.log(xhr.responsetext);
            location.reload();
        };
        xhr.send(fd);
    }
}

function addComment()
{
    const com = document.getElementById('add-com-pv-txt').value;
    if (com.length > 0) {
        const iid = document.getElementById('img-wrap').getAttribute('data-iid');
        const uid = getUID();
        var fd = new FormData();

        fd.append('iid', iid);
        fd.append('comment', com);
        fd.append('uid', uid);
        fd.append('action', 'addComment');

        var xhr = getXHR();
        xhr.open('POST', '../models/m_preview.php', true);
        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
        xhr.onload = function(e) {
           location.reload();
        };
        xhr.send(fd);
    }
}

function displayComs(txt) {
    const pv = document.getElementById('comment-wrap');
    let addCom = document.createElement('div');
    let txtPart = document.createElement('textarea');
    let btnPart = document.createElement('button');

    txtPart.setAttribute('placeholder', 'Add comment...')
    txtPart.setAttribute('maxlength', '128')
    txtPart.setAttribute('id', 'add-com-pv-txt');
    btnPart.setAttribute('id', 'add-com-pv-btn');
    addCom.setAttribute('id', 'add-com-pv-wrap');

    addCom.append(txtPart, btnPart);
    pv.append(addCom);
    addCom.addEventListener('click', addComment);
    if (txt) {
        txt = JSON.parse(txt);
    } else {
        return;
    }
    txt.forEach(function(e) {
        com = document.createElement('div');
        content = document.createElement('p');
        com.setAttribute('class', 'comment');
        content.setAttribute('class', 'comment-content');

        com.setAttribute('data-uid', e['uid']);
        com.setAttribute('data-iid', e['img_id']);
        com.setAttribute('data-cid', e['com_id']);
        content.textContent = e['username'] + ' : ' + e['text'];
        com.append(content);
        pv.append(com);
    });
}

function getComments(imgId)
{
    var fd = new FormData();
    fd.append('iid', imgId);
    fd.append('action', 'getComments');

    var xhr = getXHR();
    xhr.open('POST', '../models/m_preview.php', true);
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    xhr.onload = function(e) {
        displayComs(xhr.responseText);
    };
    xhr.send(fd);
}

function getLikeAmount(imgId, currUid)
{
    var fd = new FormData();
    fd.append('iid', imgId);
    fd.append('action', 'likeAmount');

    var xhr = getXHR();
    xhr.open('POST', '../models/m_preview.php', true);
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
    xhr.onload = function(e) {
        likeDisplay(xhr.responsetext, currUid, imgId);
    };
    xhr.send(fd);
}

function likeDisplay(likeNumber, currUid, imgId)
{
    likeBtn = document.getElementsByClassName('like-pv')[0];
    if(likeNumber) {
        likeBtn.textContent = 'Likes : ' + likeNumber;
    } else {
        likeBtn.textContent = 'Likes : 0';
    }
    if (currUid) {
        likeBtn.addEventListener('click', function () {
            var fd = new FormData();

            fd.append('iid', imgId);
            fd.append('uid', currUid);
            fd.append('action', 'likeToggle');

            var xhr = getXHR();
            xhr.open('POST', '../models/m_preview.php', true);
            xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
            xhr.onload = function(e) {
                //getLikeAmount(imgId, 0);
            };
            xhr.send(fd);
        });
    }
}

function bigImg()
{
    let check;
    if (check = document.getElementById('preview-feed')) {
        check.parentElement.removeChild(check);
    }
    let path = this.getAttribute('data-path');
    let imgId = this.getAttribute('data-iid');
    let imgUid = this.getAttribute('data-uid');
    var currUid = getUID();
    let str = this.innerText;
    let delim = '\n';
    let uname = str.slice(0, str.indexOf(delim));
    let caption = str.slice(str.indexOf(delim) + delim.length);
    let btnDel = document.createElement('button');
    let likeNum = document.createElement('button');
    let comWrap = document.createElement('div');
    let imgWrap = document.createElement('div');
    imgWrap.setAttribute('id', 'img-wrap');
    com = document.createElement('div');
    content = document.createElement('p');
    com.setAttribute('class', 'comment');
    content.setAttribute('class', 'comment-content');
    content.textContent = uname + ' : ' + caption;
    com.append(content);
    comWrap.setAttribute('id', 'comment-wrap');
    likeNum.setAttribute('class', 'like-pv');
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

    if (currUid == imgUid) {
        let delPicture = document.createElement('button');
        delPicture.setAttribute('class', 'del-pic');
        delPicture.setAttribute('name', 'delbtn');
        delPicture.textContent = 'Delete Picture';
        delPicture.addEventListener('click', deleteImg)

        imgWrap.appendChild(delPicture);
    }

    imgWrap.setAttribute('data-iid', imgId);
    imgWrap.setAttribute('data-uid', imgUid);
    pvDiv.setAttribute('id', 'preview-feed');
    pvImg.setAttribute('src', '../img/' + imgUid + '/' + path);

    imgWrap.append(pvImg, btnDel, likeNum);
    pvDiv.append(com, imgWrap, pvData, comWrap);
    document.body.appendChild(pvDiv);
    getLikeAmount(imgId, currUid);
    getComments(imgId);
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
    const feed = document.getElementById('feed');
    let divIMG = document.createElement('div');
    let image = document.createElement('img');
    let desc = document.createElement('span');
    let name = document.createElement('div');
    let caption = document.createElement('p');
    caption.append(document.createTextNode(img['caption']));

    name.setAttribute('class', 'feed-names');
    caption.setAttribute('class', 'feed-captions');
    name.innerText = img['username'];
    desc.append(name, caption);
    desc.setAttribute('class', 'feed-desc');
    divIMG.setAttribute('class', 'elem-feed');
    divIMG.addEventListener('click', bigImg);
    divIMG.setAttribute('data-path', img['path']);
    divIMG.setAttribute('data-iid', img['img_id']);
    divIMG.setAttribute('data-uid', img['uid']);
    image.setAttribute('class', 'img-feed');
    image.setAttribute('src', '../img/' + img['uid'] + '/' + img['path']);

    divIMG.append(image, desc);
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