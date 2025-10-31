const user_numbers = document.querySelectorAll('.user_number');

let number = localStorage.getItem('user_number');

for (let user_number of user_numbers){
    user_number.setAttribute('value', number);
}
document.querySelectorAll('a[href]').forEach(link => {
    const url = new URL(link.href, window.location.origin);
    if (!url.searchParams.has('user_number')) {
        url.searchParams.set('user_number', userNumber);
        link.href = url.toString();
    }
});

// Добавляем hidden input ко всем формам
document.querySelectorAll('form').forEach(form => {
    if (!form.querySelector('input[name="user_number"]')) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'user_number';
        input.value = userNumber;
        form.appendChild(input);
    }
});
