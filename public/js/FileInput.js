const input = document.querySelector("#images");
const inputParentElement = input.parentElement;

// Checking if the quantity of files exceed the limit
const limitFileQuantity = (fileList) => {
    // If the quantity of files exceed the limit, print a message and reset the input
    if (fileList.length > 20) {
        inputParentElement.innerHTML += `<div class=" text-red-500 mt-2 text-sm">Cantidad máxima de 20 imágenes excedida</div>`;
        input.classList.add("border-red-500");
        input.value = "";

        // In case the input was updated, delete the error message
    } else {
        inputParentElement.removeChild(inputParentElement.lastChild);
        input.classList.remove("border-red-500");
    }
};

// Cheking if the individual file exceed the size limit
const limitFileSize = (files) => {
    // TODO
};

input.addEventListener("change", (e) => {
    // Getting all files
    const fileList = e.target.files;

    // Checking file quantity limit
    limitFileQuantity(fileList);

    // Checking file size
    limitFileSize(fileList);
});
