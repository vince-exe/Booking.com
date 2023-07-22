const bookingsTable = document.getElementById("bookings-table");
const banner = document.getElementById('banner');
const confirmButton = document.getElementById('confirmButton');
const cancelButton = document.getElementById('cancelButton');

function setCookie(name, value, expirationDays) {
    const expirationDate = new Date();
    expirationDate.setTime(expirationDate.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + expirationDate.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

var array;
var hotelIndex;

/* get the hotel id and name */
fetch('../php_scripts/get_bookings.php')
    .then(response => response.json()).then(data => {
        if (data.status === "fail") {
            alert("An error occurred while comunicating with the server");
        } else if (data.status === "empty") {
            alert("Non hai nessuna prenotazione al momento.");
        } else {
            array = data.data;
            for (let i = 0; i < array.length; i++) {
                let tr = document.createElement('tr');

                let td1 = document.createElement('td');
                td1.classList.add('td-text');

                let titleTd1 = document.createElement('a');
                titleTd1.href = "#";
                titleTd1.innerHTML = array[i].name;

                let td2 = document.createElement('td');
                td2.classList.add('actions');

                let div1 = document.createElement('div');
                div1.classList.add('dropdown');

                let div2 = document.createElement('div');
                div2.innerHTML = '+';
                div2.classList.add('dots')

                let div3 = document.createElement('div')
                div3.classList.add('dropdown-content')

                let anchorTagUpdate = document.createElement('a');
                anchorTagUpdate.innerHTML = "Modifica";
                anchorTagUpdate.href = "#";

                let anchorTagRemove = document.createElement('a');
                anchorTagRemove.innerHTML = "Rimuovi";
                anchorTagRemove.href = "#";

                /* view the book */
                titleTd1.addEventListener('click', e => {
                    setCookie('hotelId', array[i].id, 1);
                    document.location.href = "../php/view_booking.php";
                });

                /* update the booking */
                anchorTagUpdate.addEventListener('click', e => {
                    setCookie('hotelId', array[i].id, 1);
                    document.location.href = "../php/update_booking.php";
                });

                /* remove the booking */
                anchorTagRemove.addEventListener('click', e => {
                    banner.style.display = 'flex';
                    hotelIndex = i;
                })

                div3.appendChild(anchorTagUpdate);
                div3.appendChild(anchorTagRemove);

                div1.appendChild(div2);
                div1.appendChild(div3);

                td2.appendChild(div1);
                td1.appendChild(titleTd1);

                tr.appendChild(td1);
                tr.appendChild(td2);

                bookingsTable.appendChild(tr);
            }
        }
    })
    .catch(error => {
        alert("Si è verificato un errore durante la comunicazione con il server.");
        console.error(error);
    })

confirmButton.addEventListener('click', () => {
    setCookie('hotelId', array[hotelIndex].id, 1);
});

cancelButton.addEventListener('click', () => {
    banner.style.display = 'none';
});