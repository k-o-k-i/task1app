// ------------------------------ add links

const addform = document.getElementById('addform');

if (addform){
    addform.addEventListener('submit', async event =>{
        event.preventDefault();

        const data = new FormData(addform);

        try {
            const res = await fetch(
                '/add-links',
                {
                    method: 'POST',
                    body: data,
                },
            ).then(function (response){
                return response.json();
            }).then(function (body){
                return body;
            });

            const resData = await res;
            const resArray = Object.keys(resData);
            function clearErrorMessages(){
                const collection = document.getElementsByClassName("error");
                let listArr = Array.from(collection)
                listArr.forEach((resEl) => {
                    resEl.innerHTML="";
                });
            }
            if (resData['validation'] === 'empty'){
                window.location.href ="/profile/"+resData['username'];

            }
            else if (resData['validation'] === 'passed'){
                clearErrorMessages();
                window.location.href ="/profile/"+resData['username'];
            }
            else {
                clearErrorMessages();
                resArray.forEach((resEl) => {
                    document.getElementById(resEl).innerHTML=resData[resEl];
                });
            }
        } catch (err) {
            console.log(err.message);
        }
    });

}

// ----------------------- search

const searchform = document.getElementById('searchform');

if (searchform){
    searchform.addEventListener('submit', async event =>{
        event.preventDefault();

        const data = new FormData(searchform);

        try {
            const res = await fetch(
                '/search',
                {
                    method: 'POST',
                    body: data,
                },
            ).then(function (response){
                return response.json();
            }).then(function (body){
                return body;
            });

            const resData = await res;

            const wrapper = document.getElementById("user-table-body");
            let myHTML = '';
            for (let i = 0; i < Object.keys(resData).length; i++) {
                myHTML += '<tr id="user-row"> <td class="p-4 text-sm text-gray-600"> <p class="flex justify-center text-xl">'+
                    Object.values(resData)[i].username +'</p> </td> </tr>';
            }/*  w w  w  . j av a  2  s. c o  m*/

            wrapper.innerHTML = myHTML
        } catch (err) {
            console.log('An error has occured.')
            // console.log(err.message);
        }
    });
}
