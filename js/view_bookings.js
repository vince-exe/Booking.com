const bookingsTable = document.getElementById("bookings-table");

function setCookie(name, value, expirationDays) {
    const expirationDate = new Date();
    expirationDate.setTime(expirationDate.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + expirationDate.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

/* get the hotel id and name */
fetch('../php_scripts/get_bookings.php')
    .then(response => response.json()).then(data => {
        if (data.status === "fail") {
            alert("FAIL");
        } else if (data.status === "empty") {
            alert("EMPTY");
        } else {
            let array = data.data;
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
                    setCookie('hotelId', array[i].id ,1);
                    document.location.href = "../php/view_booking.php";
                });

                /* update the booking */
                anchorTagUpdate.addEventListener('click', e => {

                });

                /* remove the booking */
                anchorTagRemove.addEventListener('click', e => {

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