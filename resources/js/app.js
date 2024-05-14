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
function toggleEditModal(modalID, id) {
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");

    // AJAX request to retrieve the data project id
    
    // axios.get(`/projects/${id}`).then((response) => {
    //     document.getElementById("edit-project-name").value = response.data.name;
    //     document.getElementById("edit-project-description").value =
    //         response.data.description;
    //     document.getElementById("edit-project-id").value = response.data.id;
    // });

    // console.log(id);

}



export { toggleModal };
