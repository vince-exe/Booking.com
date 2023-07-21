const dateBox = document.getElementById('date-box');
const hotelNameBox = document.getElementById('hotel-name-box');
const numberBox = document.getElementById('number-box');
const updateBtn = document.getElementById('update-btn');

var oldHotelName, oldPeople, oldDate;

function setDate() {
    let dateObj = new Date();
    let currYear = dateObj.getFullYear();

    dateBox.min = currYear + "-01-01";
    dateBox.max = (currYear + 100) + "-12-31";

    dateBox.value = new Date().toDateInputValue();
}

fetch("../php_scripts/get_booking.php")
    .then(response => {
        response.json().then(data => {
            if (data.status == "false") {
                alert(data.message);
            }
            else {
                let obj = data.array[0];
                hotelNameBox.value = obj.hotel_name;
                numberBox.value = obj.people;
                dateBox.value = obj.book_date;

                oldHotelName = obj.hotel_name;
                oldPeople = obj.people;
                oldDate = obj.book_date;    
            }

        })
    })
    .catch(reason => {
        alert(reason);
        console.error(reason);
    })

updateBtn.addEventListener('click', e => {
    if(updateBtn.innerHTML == "Indietro") {
        window.location.href = "../php/view_bookings.php"
        return
    }

    let hotelNameData = hotelNameBox.value.trim();

    if (hotelNameData.value.length < 5 || hotelNameData.value.length > 30) {
        return;
    }
    if (!hotelNameData || !numberBox.value || !dateBox.value) {
        alert("Assicurati di inserire tutti i campi necessari");
        return;
    }

    if (hotelNameData != oldHotelName || numberBox.value != oldPeople || dateBox.value != oldDate) {
        fetch('../php_scripts/updt_booking.php', {
            method: 'post',
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ hotel_name: hotelNameData, people: numberBox.value, book_date: dateBox.value})
        })
        .then(response => { 
            response.json().then(data => {
                if (data.status == false) {
                    if (data.message == "") {
                        alert("Errore durante la comunicazione con il database");
                    }
                    else {
                        alert(data.message)
                    }
                }
                else {
                    updateBtn.innerHTML = "Indietro"
                    document.getElementById("error-msg").style.display = "block";
                    document.getElementById("error-msg").style.color = "green";
                    document.getElementById("error-msg").innerHTML = "Modifica Effettuata";

                    hotelNameBox.setAttribute('readonly', true);
                    numberBox.setAttribute('readonly', true);
                    dateBox.setAttribute('readonly', true);
                }
            })
        })
        .catch(reason => {
            alert("Errore durante la comunicazione con il server");
            console.error(reason);
        })
    } 
})