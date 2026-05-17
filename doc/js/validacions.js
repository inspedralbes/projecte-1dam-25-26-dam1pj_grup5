document.addEventListener("DOMContentLoaded", function () {
    const formularis = document.querySelectorAll("form");

    formularis.forEach(formulari => {
        formulari.addEventListener("submit", function (e) {
            const inputs = formulari.querySelectorAll("input[required], select[required], textarea[required]");
            let correcte = true;

            inputs.forEach(camp => {
                if (camp.value.trim() === "") {
                    correcte = false;
                }
            });

            if (!correcte) {
                e.preventDefault();
                alert("Has d'omplir tots els camps obligatoris");
            }
        });
    });
});