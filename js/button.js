const im1 = document.querySelector('#img1');
const but1 = document.querySelector('#but1');

but1.addEventListener('click', event => {
    if (im1.style.display === 'none') {
        im1.style.display = 'block';
    }
    else {
        im1.style.display = 'none';
    }
});