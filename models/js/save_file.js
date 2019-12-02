function uploadBtn() {
    var data = this.parentElement.children.pvpic.src;
    var caption = prompt('Add a caption:', '');
    if (caption){
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
}

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

    xhr.upload.onprogress = function(e) {
        if (e.lengthComputable) {
            var percentComplete = (e.loaded / e.total) * 100;
            console.log(percentComplete + '% uploaded');
            console.log(xhr.responseText);
        }
    };
    xhr.send(fd);   
};