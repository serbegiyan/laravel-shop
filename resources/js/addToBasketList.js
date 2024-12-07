const alert_buttons = document.querySelectorAll('.alert');
const places = document.querySelectorAll('.place');

for (let button of alert_buttons){
    button.addEventListener('click', function(event){
        let message = document.createElement('div');
        message.textContent = 'Товар успешно добавлен в корзину';
        message.classList.add('bg-green-300');
        message.classList.add('z-50');
        message.classList.add('w-fit');
        message.classList.add('h-fit');
        message.classList.add('mx-auto');
        message.classList.add('text-center');
        message.classList.add('p-2');
        message.classList.add('rounded-lg');
        event.target.parentElement.parentElement.parentElement.prepend(message);
        setTimeout(function(){
            message.remove();
        }, 1500);
    });
}
