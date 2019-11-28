var _validFileExtensions = [".jpg", ".jpeg", ".png"];

function validUploadInput(input) {
    console.log(input.value);
    if (input.type == "file") {
        var fileName = input.value;
         if (fileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var extension = _validFileExtensions[j];
                if (fileName.substr(fileName.length - extension.length, extension.length).toLowerCase() == extension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                input.value = "";
                return false;
            }
        }
    }
    return true;
}

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

function uplMainInit() {


    const main = document.getElementById('up-main');

    main.innerHTML += '<form><input type="file" name="file1" onchange="validUploadInput(this);" />';
    main.innerHTML += '<button id="upl-btn-prev">submit</button></form>';
   // main.innerHTML += '<canvas id="canvas"></canvas><br>';
   // main.innerHTML += '<button id="snap">Take Picture</button>';
}

uplMainInit();
