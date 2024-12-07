const parents = document.querySelectorAll('.parent');

for (let parent of parents){
    parent.addEventListener('click', function(event){
        let quantity_first = parent.querySelector('.quantity_first');
        let quantity_last = parent.querySelector('.quantity_last');
        let price = parent.querySelector('.price');
        let total_price = parent.querySelector('.total_price')

        let val = Number(quantity_first.getAttribute('value'));
        let val_price = Number(price.getAttribute('value'));

        if (event.target.classList.contains('plus')){
            val += 1;
            quantity_first.setAttribute('value', String(val));
            quantity_last.setAttribute('value', String(val));
        }
        if (event.target.classList.contains('minus')){
            val -= 1;
            quantity_first.setAttribute('value', String(val));
            quantity_last.setAttribute('value', String(val));
        }
        let tot_price = val * val_price;
        total_price.setAttribute('value', String(tot_price));

        parent.submit();
    })
}
