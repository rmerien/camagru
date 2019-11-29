function prevOnClick() {
    const btn = this.children.upbtn;
    const btnDel = this.children.upbtn;
    if (!(btn)) {
        const btn = document.createElement('button');
        btn.setAttribute('class', 'up-pv');
        btn.setAttribute('name', 'upbtn');
        btn.addEventListener('click', takePhoto);
        btn.appendChild(document.createTextNode("Upload"));
        this.appendChild(btn);


        const btnDel = document.createElement('button');
        btnDel.setAttribute('class', 'del-pv');
        btnDel.setAttribute('name', 'delbtn');
        btnDel.addEventListener('click', function() {
            console.log(this + ' lol');
        });
        btnDel.appendChild(document.createTextNode("X"));
        this.appendChild(btnDel);

    } else {
        this.removeChild(btn);
        this.removeChild(btnDel);
    }
    btn.addEventListener('click', uploadBtn)
}

function takePhoto() {
    const data = document.getElementById('canvas').toDataURL('image/jpeg');

    const strip = document.getElementById('up-strip');

    const img = document.createElement('div');
    img.classList.add('up-preview');
    img.innerHTML = `<img src="${data}" name='pvpic' alt="your picture" class='preview-pic'/>`;
    img.addEventListener('click', prevOnClick);
    strip.insertBefore(img, strip.firstChild);
}