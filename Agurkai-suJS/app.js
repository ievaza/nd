console.log('Labas')

const button = document.querySelector('#sodinti');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

const addNewList = () => {
    const agurkai = document.querySelectorAll('.agurkas');
    // console.log(agurkai);
    agurkai.forEach(agurkas => {
        // console.log(agurkas);
        agurkas.querySelector('[type=button]').addEventListener('click', () => {
            const id = agurkas.querySelector('[name=rauti]').value;
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


button.addEventListener('click', () => {
    const count = document.querySelector('[name=kiekis]').value;
    axios.post(apiUrl, {
        kiekis: count,
        sodinti: 1
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