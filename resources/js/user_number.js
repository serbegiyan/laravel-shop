const lets_small = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p',
    'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];
const lets_big = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P',
    'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];
const symbols = ['!', '@', '#', '$', '%', '&', '?'];
let user_number;
let user_old = localStorage.getItem('user_number');
if (user_old === null) {
    alert('Внимание! Это демонстрационный сайт. Совершить покупку невозможно.');
    let user_hash = [];
    for (let i = 0; i < 3; i++) {
        let randletsm = Math.round(Math.random() * 25);
        user_hash.push(lets_small[randletsm]);
        let randletbg = Math.round(Math.random() * 25);
        user_hash.push(lets_big[randletbg]);
        let randsim = Math.round(Math.random() * 6);
        user_hash.push(symbols[randsim]);
        let rand = Math.round(Math.random() * 9);
        user_hash.push(rand);
    }
    user_number = user_hash.join('');
    localStorage.setItem('user_number', user_number);
}




