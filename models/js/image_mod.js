function prevOnClick() {
    const btn = this.children.upbtn;
    const btnDel = this.children.delbtn;
    if (!(this.children.upbtn)) {
        //Display Upload and Delete button on Image Preview
        const btn = document.createElement('button');
        btn.setAttribute('class', 'up-pv');
        btn.setAttribute('name', 'upbtn');
        btn.textContent = 'Upload';
        btn.addEventListener('click', uploadBtn);
        this.appendChild(btn);

        const btnDel = document.createElement('button');
        btnDel.setAttribute('class', 'del-pv');
        btnDel.setAttribute('name', 'delbtn');
        btnDel.textContent = 'X';
        this.appendChild(btnDel);
        btnDel.addEventListener('click', function() {
            this.parentElement.parentElement.removeChild(this.parentElement);
        });

    } else {
        this.removeChild(this.children.upbtn);
        this.removeChild(this.children.delbtn);
    }
}

function takePhoto() {
    const data = document.getElementById('canvas').toDataURL('image/jpeg');

    const strip = document.getElementById('up-strip');

    const imgPV = document.createElement('div');
    imgPV.classList.add('up-preview');
    imgPV.addEventListener('click', prevOnClick);

    const imgElem = document.createElement('img');
    imgElem.setAttribute('class', 'preview-pic');
    imgElem.setAttribute('alt', 'Your Picture');
    imgElem.setAttribute('src', `${data}`);
    imgElem.setAttribute('name', 'pvpic');
    imgPV.appendChild(imgElem);
    strip.insertBefore(imgPV, strip.firstChild);
}