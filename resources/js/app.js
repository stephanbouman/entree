require('./bootstrap');

require('alpinejs');

document.getElementById('startGambling').addEventListener('click',function(event){
    axios.get('/random-event').then(function(response){

        alert(`Je gaat naar '${response.data.title}' in ${response.data.location}!`);
    });

});
