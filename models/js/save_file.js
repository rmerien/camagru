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