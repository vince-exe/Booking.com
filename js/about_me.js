const firstNameBox = document.getElementById('firstname-box');
const lastNameBox = document.getElementById('lastname-box');
const emailBox = document.getElementById('email-box');

fetch('../php_scripts/get_user.php').then(response => {
    response.json().then(data => {
        if(data[0].status == "true") {
            firstNameBox.placeholder = data[0].first_name;
            lastNameBox.placeholder = data[0].last_name;
            emailBox.placeholder = data[0].email;
        }   
        
    })
})
.catch(reason => {
    alert("Errore durante la comunicazione con il server");
    console.error(reason);
})