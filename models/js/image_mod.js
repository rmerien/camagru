function takePhoto() {
    const data = document.getElementById('canvas').toDataURL('image/jpeg');

    const strip = document.getElementById('up-strip');

    const img = document.createElement('div');
    img.classList.add('up-preview');
    img.innerHTML = `<img src="${data}" name='pvpic' alt="your picture" class='preview-pic'/>`;
    img.addEventListener('click', prevOnClick);
    strip.insertBefore(img, strip.firstChild);
}
