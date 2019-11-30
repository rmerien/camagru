function prevOnClick() {
    const btn = this.children.upbtn;
    const btnDel = this.children.delbtn;
    if (!(this.children.upbtn)) {
        //Display Upload and Delete button on Image Preview
        const btn = document.createElement('button');
        btn.setAttribute('class', 'up-pv');
        btn.setAttribute('name', 'upbtn');
        btn.appendChild(document.createTextNode("Upload"));
        btn.addEventListener('click', uploadBtn);
        this.appendChild(btn);

        const btnDel = document.createElement('button');
        btnDel.setAttribute('class', 'del-pv');
        btnDel.setAttribute('name', 'delbtn');
        btnDel.appendChild(document.createTextNode("X"));
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

    const img = document.createElement('div');
    img.classList.add('up-preview');
    img.innerHTML = `<img src="${data}" name='pvpic' alt="your picture" class='preview-pic'/>`;
    img.addEventListener('click', prevOnClick);
    strip.insertBefore(img, strip.firstChild);
}