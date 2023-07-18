/* get the hotel id and name */
fetch('../php_scripts/get_bookings.php')
.then(response => response.json()).then(data => {
    if (data.status === "fail") {
        alert("FAIL");
    } else if (data.status === "empty") {
        alert("EMPTY");
    } else {
        console.log(data)
        /*
        data.data.forEach(item => {
            console.log("\nId: " + item.id + " Nome: " + item.name);
        });
        */
    }
})
.catch(error => {
    alert("Si è verificato un errore durante la comunicazione con il server.");
    console.error(error);
})