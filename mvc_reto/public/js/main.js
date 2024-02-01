




function validateInput(input, validationFunction) {
  var value = input.value;
  if (!validationFunction(value)) {
    input.classList.add("border-danger");
  } else {
    input.classList.remove("border-danger");
  }
}
