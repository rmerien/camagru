/*function uploadBtn() {
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
    alert(evt);
    if (window.File && window.FileReader && window.FileList && window.Blob) {
  
        var files = evt.target.files; // FileList object

        const reader = new FileReader();
        reader.onload = function () {

        }
    
        const img = new Image();
        img.onload = function () {
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');
            context.drawImage(img, 0, 0);
        }
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
  }*/

function uplMainInit() {

    const main = document.getElementById('up-main');
    const strip = document.getElementById('up-strip');

    main.innerHTML = '<input type="file" id="file"  />';
    main.innerHTML += '<canvas id="canvas"></canvas><br>';

    const input = document.getElementById('file');

    input.addEventListener('change', function (e) {
        alert('lol');
        console.log(input.files);
        const reader = new FileReader();
        reader.onload = function() {
            const img = new Image();
            img.onload = function() {
                const canvas = document.getElementById('canvas');
                const context = canvas.getContext('2d');
                const width = img.naturalWidth;
                const height = img.naturalHeight;
                canvas.width = width;
                canvas.height = height;
                context.drawImage(img, 0, 0);
            }
            img.src = reader.result;
            console.log(img.src);
        }
        if (reader.readAsDataURL) {
            reader.readAsDataURL(input.files[0]);
        } else if (reader.readAsDataurl) {
            reader.readAsDataurl(input.files[0]);
        }
    }, false);
    
    /*input.addEventListener('change', function (e) {
        accept="image/png, image/jpeg, image"
        console.log(input.files);
        const reader = new FileReader();
        reader.onload = function () {

        }
        const img = new Image();
        img.onload = function () {
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            context.drawImage(img, 0, 0);
        }
        img.src = reader.result;
        document.body.appendChild(img);
    });

    main.innerHTML += '<canvas id="canvas"></canvas><br>';
   // main.innerHTML += '<button id="snap">Take Picture</button>';*/
}

uplMainInit();
//onchange="validUploadInput(this);