function calculateDimensions(img) {
    let height = img.naturalHeight;
    let width = img.naturalWidth;

    if (height / width > 2 || width / height > 2) {
        return;
    }

    if (height > 900 || width > 900) {
        if (height > width) {
            oldHeight = height;
            height = 900;
            width = (height / oldHeight) * width;
        } else {
            oldWidth = width;
            width = 900;
            height = (width / oldWidth) * height;
        }
    }
    dimensions = [height, width];
    return dimensions;
}

function uplMainInit() {
    const canvas = document.createElement('canvas');
    canvas.setAttribute('id', 'canvas');
    const page = document.getElementById('wrap-id-1');
    const main = document.createElement('div');
    const strip = document.createElement('div');
    const input = document.createElement('input');
    const label = document.createElement('label');
    const img = new Image();
    let drop = document.createElement('select');
    let filters = ['No Filter', 'money', 'hearts', 'love', '2020'];

    main.setAttribute('id', 'up-main');
    strip.setAttribute('id', 'up-strip');
    drop.addEventListener('change', drawFilter);
    page.appendChild(main);
    page.appendChild(strip);
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/png, image/jpeg, image/jpg');
    input.setAttribute('id', 'file');
    label.setAttribute('for', 'file');
    label.setAttribute('id', 'file-lab');
    main.appendChild(input);
    main.appendChild(label);
    main.appendChild(document.createElement('br'));
    drop.setAttribute('id', 'filters-list');
    drop.setAttribute('name', 'filters');
    filters.forEach(function(e) {
        let filter = document.createElement('option');
        filter.innerText = e;
        filter.setAttribute('value', e);
        drop.appendChild(filter);
    });
    input.addEventListener('change', function (e)
    {
        main.prepend(canvas);
        //Check if the API for reading files are available
        if (window.File && window.FileReader && window.FileList && window.Blob)
        {
            const reader = new FileReader();
            drop.selectedIndex = 0;
            reader.onload = function() {
                img.onload = function()
                {
                    const dimensions = calculateDimensions(img);
                    if (!dimensions) {
                        location.reload();
                        alert('dimensions do not fit');
                    }
                    const height = dimensions[0];
                    const width = dimensions[1];
                    //Draw Image On Canvas
                    const canvas = document.getElementById('canvas');
                    const context = canvas.getContext('2d');
                    canvas.width = width;
                    canvas.height = height;
                    context.drawImage(img, 0, 0, width, height);
                    //Create Button For Upload
                    const button = document.createElement('button');
                    button.setAttribute('id', 'snap');
                    button.addEventListener('click', takePhoto);
                    main.appendChild(button);
                    main.appendChild(drop);
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

    function drawFilter() {
        const dimensions = calculateDimensions(img);
        const height = dimensions[0];
        const width = dimensions[1];
        const filter = new Image();
        filter.src = '../img/filters/' + drop.value + '.png';
        filter.onload = function()
        {
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');
            context.drawImage(img, 0, 0, width, height);
            context.drawImage(filter, 0, 0, width, height);
        }
    }
}


uplMainInit();