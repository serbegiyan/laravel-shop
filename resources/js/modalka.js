let currents = document.querySelectorAll('.currentImg');
const modalWindow = document.querySelector('#modalWindow');
const grandpapa = document.querySelector('#grandpapa');
const parent = document.querySelector('#parent');
const clip = document.querySelector('#clip');
const next = document.querySelector('#next');
const prev = document.querySelector('#prev');
let allSrc = document.querySelectorAll('.currentImg');
let clipArts = clip.querySelectorAll('img');
let arraySrc = [];
let screenWidth = window.innerWidth;
let initialPoint;
let finalPoint;

for (let currentImg of currents){
    currentImg.addEventListener('click', function(event){
        let currentSrc = event.target.getAttribute('src');
        let imgBig = document.createElement('img');
        imgBig.setAttribute('src', currentSrc);
        parent.append(imgBig);
        modalWindow.classList.remove('hidden');
    });
}
document.addEventListener('touchmove', (event) => {
  console.log('Вы приложили палец к элементу')
})


/*if (screenWidth < 768){
    parent.addEventListener('touchstart', function(event) {
        event.preventDefault();
        event.stopPropagation();
        initialPoint = event.changedTouches[0];
        }, false);
        parent.firstElementChild.addEventListener('touchend', function(event) {
        event.preventDefault();
        event.stopPropagation();
        finalPoint = event.changedTouches[0];
        let xAbs = Math.abs(initialPoint.pageX - finalPoint.pageX);
            if (xAbs > 20) {
                if (finalPoint.pageX < initialPoint.pageX){
                    console.log('left');
                    for (let i = 0; i < arraySrc.length; i++){
                        if(arraySrc[i] ===  parent.firstElementChild.getAttribute('src')){
                            if (i >= arraySrc.length - 1){
                                i = -1;
                            }
                            parent.firstElementChild.setAttribute('src', arraySrc[i + 1]);
                            break;
                        }
                    }
                }
                else{
                    console.log('right');

                    for (let i = arraySrc.length; i >= 0; i--){
                        if(arraySrc[i] ===  parent.firstElementChild.getAttribute('src')){
                            if (i == 0){
                                i = arraySrc.length;
                            }
                            parent.setAttribute('src', arraySrc[i - 1]);
                            break;
                        }
                    }
                }
            }
        });
    }*/

for (let elem of allSrc){
    if(elem.getAttribute('src') != '  '){
        arraySrc.push(elem.getAttribute('src'));
    }
    let imgClip = document.createElement('img');
    imgClip.setAttribute('src', elem.getAttribute('src'));
    imgClip.classList.add('max-w-32');
    imgClip.classList.add('w-fit');
    imgClip.classList.add('max-h-20');
    clip.append(imgClip);
}

modalWindow.addEventListener('click', function(event){
    if(!parent.contains(event.target) && !clip.contains(event.target)
    && !next.contains(event.target) && !prev.contains(event.target)){
            modalWindow.classList.add('hidden');
            parent.removeChild(parent.firstElementChild);
    }
});

clip.addEventListener('click', function(event){
    parent.removeChild(parent.firstElementChild);
    let cloneArt = event.target.cloneNode(true);
    cloneArt.classList.remove('max-h-20');
    cloneArt.classList.remove('max-w-32');
    parent.append(cloneArt);
});

if (allSrc[1].getAttribute('src') == '  '){
    next.classList.add('hidden');
    prev.classList.add('hidden');
}

next.addEventListener('click', function(){
    for (let i = 0; i < arraySrc.length; i++){
        if(arraySrc[i] ===  parent.firstElementChild.getAttribute('src')){
            if (i >= arraySrc.length - 1){
                i = -1;
            }
            parent.firstElementChild.setAttribute('src', arraySrc[i + 1]);
            break;
        }
    }
});

prev.addEventListener('click', function(){
    for (let i = arraySrc.length; i >= 0; i--){
        if(arraySrc[i] ===  parent.firstElementChild.getAttribute('src')){
            if (i == 0){
                i = arraySrc.length;
            }
            parent.firstElementChild.setAttribute('src', arraySrc[i - 1]);
            break;
        }
    }
});
