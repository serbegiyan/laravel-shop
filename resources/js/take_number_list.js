const user_numbers = document.querySelectorAll('.user_number');

let number = localStorage.getItem('user_number');

for (let user_number of user_numbers){
    user_number.setAttribute('value', number);
}
