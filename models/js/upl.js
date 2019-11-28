function uploadBtn() {
    var data = this.parentElement.children.pvpic.src;
    var caption = prompt('Add a caption:', '');
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

function prevOnClick() {
    btn = this.children.upbtn;
    if (!(btn)) {
        this.innerHTML += '<button class="up-pv" name="upbtn">Upload</button>';
        btn = this.children.upbtn;
    } else {
        this.removeChild(btn);
    }
    btn.addEventListener('click', uploadBtn)
}

function handleFileSelect(evt) {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
  
        var files = evt.target.files; // FileList object

        console.log(files);

    // files is a FileList of File objects. List some properties.
        var output = [];
        for (var i = 0, f; f = files[i]; i++) {
        output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                    f.size, ' bytes, last modified: ',
                    f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                    '</li>');
        }
        document.getElementById('up-strip').innerHTML = '<ul>' + output.join('') + '</ul>';
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
  }

function uplMainInit() {

    const main = document.getElementById('up-main');

    main.innerHTML = '<input type="file" id="file" accept="image/png, image/jpeg, image" />';
    document.getElementById('file').addEventListener('change', handleFileSelect, false);
   // main.innerHTML += '<canvas id="canvas"></canvas><br>';
   // main.innerHTML += '<button id="snap">Take Picture</button>';
}

uplMainInit();
//onchange="validUploadInput(this);