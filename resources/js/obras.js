document.addEventListener("DOMContentLoaded", function () {
    const formObras = document.querySelector("#form-obras");

    if (!formObras) return;

    formObras.addEventListener("submit", function (event) {
        let inputs = formObras.querySelectorAll("input[required], textarea[required]");
        let valido = true;

        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.classList.add("is-invalid");

                let feedback = input.closest(".mb-3").querySelector(".invalid-feedback");
                if (feedback) feedback.style.display = "block";

                valido = false;
            } else {
                input.classList.remove("is-invalid");

                let feedback = input.closest(".mb-3").querySelector(".invalid-feedback");
                if (feedback) feedback.style.display = "none";
            }
        });

        if (!valido) {
            event.preventDefault();
            formObras.classList.add("was-validated"); 
        }
    });
});