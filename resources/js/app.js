import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

document.addEventListener("DOMContentLoaded", function() {
    const confirmMessage = document.getElementById("ms_message")
    console.log(confirmMessage);
    if (confirmMessage) {
        setTimeout(function() {
            confirmMessage.classList.add("d-none")
        }, 4000);
    }
})

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

const buttons = document.querySelectorAll(".ms_btn_cancel");

if (buttons.length > 0) {
    buttons.forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const deleteModal = new bootstrap.Modal(
                document.getElementById('delete-modal')
            );
            const title = button.getAttribute("data-title");
            
            document.getElementById("title").innerText = capitalizeFirstLetter(title);
             
            deleteModal.show();

            document.querySelector(".ms_btn").addEventListener("click", function() {
                button.parentElement.submit();
            })
        });
    });
};