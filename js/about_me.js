fetch('../php_scripts/get_user.php').then(response => {
    response.text().then(data => {
        console.log(data)
    })
})
.catch(reason => {
    alert("Errore durante la comunicazione con il server");
    console.error(reason);
})