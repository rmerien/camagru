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
}*/

function uplMainInit() {

    const main = document.getElementById('up-main');
    const strip = document.getElementById('up-strip');

    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/png, image/jpeg, image/jpg');
    input.setAttribute('id', 'file');
    main.appendChild(input);
    
    main.appendChild(document.createElement('br'));

    const canvas = document.createElement('canvas');
    canvas.setAttribute('id', 'canvas');
    main.appendChild(canvas);

    input.addEventListener('change', function (e) {
        //Check if the API for reading files are available
        if (window.File && window.FileReader && window.FileList && window.Blob) {

            const reader = new FileReader();
            reader.onload = function() {
                const img = new Image();
                img.onload = function() {
                    //Draw Image On Canvas
                    const canvas = document.getElementById('canvas');
                    const context = canvas.getContext('2d');
                    const width = img.naturalWidth;
                    const height = img.naturalHeight;
                    canvas.width = width;
                    canvas.height = height;
                    context.drawImage(img, 0, 0);
                    //Create Button For Upload
                    const button = document.createElement('button');
                    button.setAttribute('id', 'snap');
                    button.addEventListener('click', takePhoto);
                    button.appendChild( document.createTextNode("Submit") );
                    main.appendChild(button);
                }
                img.src = reader.result;
                console.log(img.src);
            }
            if (reader.readAsDataURL) {
                reader.readAsDataURL(input.files[0]);
            } else if (reader.readAsDataurl) {
                reader.readAsDataurl(input.files[0]);
            }
        } else {
            alert('The File APIs are not fully supported in this browser.');
    }
    }, false);
}

uplMainInit();