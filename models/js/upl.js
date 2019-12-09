function uplMainInit() {

    const page = document.getElementById('wrap-id-1');
    const main = document.createElement('div');
    const strip = document.createElement('div');

    main.setAttribute('id', 'up-main');
    strip.setAttribute('id', 'up-strip');

    page.appendChild(main);
    page.appendChild(strip);

    const input = document.createElement('input');
    const label = document.createElement('label')
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/png, image/jpeg, image/jpg');
    input.setAttribute('id', 'file');
    input.setAttribute('style', 'display:none');
    label.setAttribute('for', 'file');
    label.setAttribute('id', 'file-lab');
    label.textContent = 'Choose File';
    main.appendChild(input);
    main.appendChild(label);
    
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
                    button.textContent = 'Submit';
                    //button.appendChild( document.createTextNode("Submit") );
                    main.appendChild(button);
                }
                img.src = reader.result;
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