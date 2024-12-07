const alert_button = document.querySelector('#alert');
const place = document.querySelector('#place');

alert_button.addEventListener('click', function(){
    let message = document.createElement('div');
    message.textContent = 'Товар успешно добавлен в корзину';
    message.classList.add('bg-green-300');
    message.classList.add('z-50');
    message.classList.add('w-fit');
    message.classList.add('m-auto');
    message.classList.add('p-2');
    message.classList.add('rounded-lg');
    place.prepend(message);
    setTimeout(function(){
        message.remove();
    }, 1500);
});
