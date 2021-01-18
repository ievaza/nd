console.log('Labas')

const buttonCuc = document.querySelector('#cucumber');
const buttonTom = document.querySelector('#tomato');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');


document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
        list: 1,
    })
        .then(function (response) {
            console.log(response.data);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            // augurku klases nodai, is naujo pasetint trynimo mygtuko eventus
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });

})
const addNewList = () => {
    const darzoves = document.querySelectorAll('.darzoves');
    console.log(darzoves);
    darzoves.forEach(darzoves => {
        console.log(darzoves);
        darzoves.querySelector('[type=button]').addEventListener('click', () => {
            const id = darzoves.querySelector('[name=rauti]').value;
            axios.post(apiUrl, {
                id: id,
                rauti: 1
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
    axios.post(apiUrl, {
        'kiekis': count,
        'cucumber': 1
    })
        .then(function (response) {
            console.log(response.data);
            list.innerHTML = response.data.list;
            document.querySelector('[name=kiekA]').value = '';
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});

buttonTom.addEventListener('click', () => {
    const count = document.querySelector('[name=kiekP]').value;
    axios.post(apiUrl, {
        'kiekis': count,
        'tomato': 1
    })
        .then(function (response) {
            console.log(response.data);
            list.innerHTML = response.data.list;
            document.querySelector('[name=kiekP]').value = '';

            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});