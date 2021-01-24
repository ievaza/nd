const buttonAll = document.querySelector('#skintiVisus');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');


document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/list', {})
        .then(function (response) {
            console.log(response);
            list.innerHTML = response.data.list;
            harvest();
            harvestOne();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

const harvestOne = () => {
    const darzoves = document.querySelectorAll('.darzoves');
    darzoves.forEach(darzoves => {
        const button = darzoves.querySelector('[name=israuti]');
        if (button) {
            button.addEventListener('click', () => {
                const id = darzoves.querySelector('[name=israuti]').value;
                axios.post(apiUrl + '/harvestOne', {
                    id: id,
                })
                    .then(function (response) {
                        console.log(response);
                        list.innerHTML = response.data.list;
                        harvest();
                        harvestOne();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}


const harvest = () => {
    const darzoves = document.querySelectorAll('.darzoves');
    darzoves.forEach(darzove => {
        const button = darzove.querySelector('#skintiKiek');
        if (button) {
            button.addEventListener('click', () => {
                const id = darzove.querySelector('[name=skinti]').value;
                const count = darzove.querySelector('[name=kiek]').value;
                axios.post(apiUrl + '/harvest', {
                    id: id,
                    'skintiKiek': count
                })
                    .then(function (response) {
                        console.log(response);
                        list.innerHTML = response.data.list;
                        harvest();
                        harvestOne();
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
    axios.post(apiUrl + '/harvestAll', {})
        .then(function (response) {
            console.log(response);
            list.innerHTML = response.data.list;
            harvest();
            harvestOne();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});