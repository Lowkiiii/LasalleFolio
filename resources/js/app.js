import "./bootstrap";
import { Modal, Tooltip, Input, initTE } from "tw-elements";
import "typeface-inter";
initTE({ Modal, Tooltip, Input });

function toggleModal(modalID) {
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
}

// Create anoter toggle method for edit
// function toggleEditModal(modalID, id) {
//     document.getElementById(modalID).classList.toggle("hidden");
//     document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
//     document.getElementById(modalID).classList.toggle("flex");
//     document.getElementById(modalID + "-backdrop").classList.toggle("flex");

//     // AJAX request to retrieve the data
//     fetch(`/projects/${id}/edit`)
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Network response was not ok');
//             }
//             return response.json();
//         })
//         .then(data => {
//             // Update the modal fields with the retrieved data
//             document.getElementById('edit-modal-project').value = data.project;
//             document.getElementById('edit-modal-description').value = data.description;
//             document.getElementById('edit-modal-date-started').value = data.date_started;
//             document.getElementById('edit-modal-date-ended').value = data.date_ended;
//             // Update other modal fields as needed
//         })
//         .catch(error => {
//             console.error('Error fetching data:', error);
//         });
// }



export { toggleModal };
