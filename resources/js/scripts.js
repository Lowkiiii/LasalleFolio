function toggleModal(modalID) {
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
}

function toggleColor(element) {
    element.querySelector(".heart-path").classList.toggle("react-heart");
}

function toggleReply(replyInput) {
    var replyInput = document.getElementById("replyInput");
    replyInput.classList.toggle("hidden");
}
