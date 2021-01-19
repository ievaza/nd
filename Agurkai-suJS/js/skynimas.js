const buttonAll = document.querySelector('#skintiVisus');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');


document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
        list: 1,
    })
        .then(function (response) {
            console.log(response);
            list.innerHTML = response.data.list;
            skintiKiek();
            skinti();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });

})
const skinti = () => {
    const darzoves = document.querySelectorAll('.darzoves');
    darzoves.forEach(darzoves => {
        const button = darzoves.querySelector('[name=israuti]');
        if (button) {
            button.addEventListener('click', () => {
                const id = darzoves.querySelector('[name=israuti]').value;
                axios.post(apiUrl, {
                    id: id,
                    'israuti': 1
                })
                    .then(function (response) {
                        console.log(response);
                        list.innerHTML = response.data.list;
                        skintiKiek();
                        skinti();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    });
}


const skintiKiek = () => {
    const darzoves = document.querySelectorAll('.darzoves');
    darzoves.forEach(darzove => {
        const button = darzove.querySelector('#skintiKiek');
        if (button) {
            button.addEventListener('click', () => {
                const id = darzove.querySelector('[name=skinti]').value;
                const count = darzove.querySelector('[name=kiek]').value;
                axios.post(apiUrl, {
                    id: id,
                    'kiek': count,
                    'skinti': 1
                })
                    .then(function (response) {
                        console.log(response);
                        list.innerHTML = response.data.list;
                        skintiKiek();
                        skinti();

                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    });
}


buttonAll.addEventListener('click', () => {
    axios.post(apiUrl, {
        'skintiViskus': 1
    })
        .then(function (response) {
            console.log(response);
            list.innerHTML = response.data.list;
            skintiKiek();
            skinti();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});