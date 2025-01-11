// script jsem vložil na konec body v indexu
// měl by zabránit odeslání pokud nejsou všechna pole vyplněná
// phonePattern by měl zkontrolovat, jestli jde o telefonní číslo
// vypíše chybové hlášky pod formulářem
document
  .getElementById("insertClient")
  .addEventListener("submit", function (event) {
    const firstNameInput = document.getElementById("first_name").value.trim()
    const secondNameInput = document.getElementById("second_name").value.trim()
    const ageInput = document.getElementById("age").value.trim()
    const phoneInput = document.getElementById("phone").value.trim()
    const phonePattern = /^(?:\+420)? ?[0-9]{3} ?[0-9]{3} ?[0-9]{3}$/
    const errorEmpty = document.getElementById("errorEmpty")
    const errorFormat = document.getElementById("errorFormat")
    if (!firstNameInput || !secondNameInput || !ageInput || !phoneInput) {
      errorEmpty.style.display = "block"
      event.preventDefault() // Zabrání odeslání formuláře
    } else {
      errorEmpty.style.display = "none"
    }
    if (phoneInput && !phonePattern.test(phoneInput)) {
      errorFormat.style.display = "block"
      event.preventDefault() // Zabrání odeslání formuláře
    } else {
      errorFormat.style.display = "none"
    }
  })
