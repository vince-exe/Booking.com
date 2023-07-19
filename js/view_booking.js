const hotelNameBox = document.getElementById("hotel-name-box");
const numberBox = document.getElementById("number-box");
const dateBox = document.getElementById("date-box");

function deleteCookie(name) {
    const expirationDate = new Date();
    expirationDate.setTime(expirationDate.getTime() - 1);
    const expires = "expires=" + expirationDate.toUTCString();
    document.cookie = name + "=;" + expires + ";path=/;";
}

function getCookie(name) {
    const cookieString = document.cookie;
    const cookies = cookieString.split(';');

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].trim();
        if (cookie.startsWith(name + '=')) {
            return cookie.substring(name.length + 1);
        }
    }

    return null; // Il cookie non è stato trovato
}

if (getCookie("hotelId") == null) {
    alert("Selezionare una prenotazione valida!");
}

fetch("../php_scripts/get_booking.php")
.then(response => {
    response.json().then(data => {
        if (data.status == "false") {
            alert(data.message);
        }
        else {
            let obj = data.array[0];
            hotelNameBox.placeholder = obj.hotel_name;
            numberBox.placeholder = obj.people;

            let arr = obj.book_date.split('-');
            dateBox.placeholder = arr[2] + "-" + arr[1] + "-" + arr[0];
        }
        
    })
})
.catch(reason => {
    alert(reason);
    console.error(reason);
})