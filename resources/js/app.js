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

export { toggleModal };
