console.log('Labas')


const button = document.querySelector('[type=button]');
const place = document.querySelector('#atsakymas');


button.addEventListener('click', () => {

    const info = document.querySelector('#infojs').value; //nodevalue pasiimam elemnto reiksme
    //darom siuntima su axios biblioteka


    axios.post(apiUrl, { //apiUrl i koki konkretu psl turi kreiptis
        input: info,
        kitkass: 'zuikio ausys' //viskas kas cia siunciama paverciama json stringu
    })
        .then(function (response) {
            console.log(response.data.ans);
            place.innerHTML = response.data.ans;
        })
        .catch(function (error) { //kai gaunam kvaila ats kai ne 200
            console.log(error);
        });

    console.log(info)
});


