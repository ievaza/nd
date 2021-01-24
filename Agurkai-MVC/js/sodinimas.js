const buttonCuc = document.querySelector('#cucumber');
const buttonTom = document.querySelector('#tomato');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');


document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/list', {})
        .then(function (response) {
            // console.log(response);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

const addNewList = () => {
    const darzoves = document.querySelectorAll('.darzoves');
    darzoves.forEach(darzoves => {
        darzoves.querySelector('[type=button]').addEventListener('click', () => {
            const id = darzoves.querySelector('[name=rauti]').value;
            axios.post(apiUrl + '/remove', {
                id: id
            })
                .then(function (response) {
                    console.log(response.data);
                    list.innerHTML = response.data.list;
                    errorMsg.innerHTML = '';
                    addNewList();
                })
                .catch(function (error) {
                    console.log(error.response.data.msg);
                    errorMsg.innerHTML = error.response.data.msg;
                });
        });
    });
}

buttonCuc.addEventListener('click', () => {
    const count = document.querySelector('[name=kiekA]').value;

    axios.post(apiUrl + '/cucumber', {
        'kiekis': count
    })
        .then(function (response) {
            console.log(response);
            list.innerHTML = response.data.list;
            document.querySelector('[name=kiekA]').value = '';
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});

buttonTom.addEventListener('click', () => {
    const count = document.querySelector('[name=kiekP]').value;
    axios.post(apiUrl + '/tomato', {
        'kiekis': count
    })
        .then(function (response) {
            console.log(response);
            list.innerHTML = response.data.list;
            document.querySelector('[name=kiekP]').value = '';
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});