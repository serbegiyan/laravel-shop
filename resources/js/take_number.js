window.onload = function() {
    const user_number = document.querySelector('.user_number_one');

    let number = localStorage.getItem('user_number');
    user_number.setAttribute('value', number);
    console.log(number)
}
