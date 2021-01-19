const buttonAll = document.querySelector('#skintiViska');
const buttonCount = document.querySelector('#skintiKiek');
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
            const id = darzoves.querySelector('[name=skintiVisus]').value;
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
                        // skinti();
                        // skintiVisusVienoAgurko();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    });
}


buttonCount.addEventListener('click', () => {
    const count = document.querySelector('[name=kiek]').value;
    axios.post(apiUrl, {
        'kiekis': count

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