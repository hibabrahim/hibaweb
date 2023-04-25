// Select the form element
const form = document.querySelector('#signup_form');



const fullNameInput = form.querySelector('#fullname');
const emailInput = form.querySelector('#email');
const passwordInput = form.querySelector('#password');

const addressInput = form.querySelector('#adress');
const phoneInput = form.querySelector('#phone');
const dateOfBirthInput = form.querySelector('#dateOfBirth');


// Add event listener to the form on submit
form.addEventListener('submit', (event) => {
  // Prevent the form from submitting
  event.preventDefault();
 

  
  // Validate full name field
 const fullNameValue = fullNameInput.value.trim();
  if (!fullNameValue.match(/^[a-zA-Z]+$/)) {
    alert('Full name must contain only letters');
    return;
  }

  // Validate password field
  const passwordValue = passwordInput.value.trim();
  if (!passwordValue.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
    alert('Password must contain at least one letter and one number and be at least 8 characters long');
    return;
  }

  // Validate phone field
 const phoneValue = phoneInput.value.trim();
  if (!phoneValue.match(/^\d{8}$/)) {
    alert('Phone number must contain only 8 digits');
    return;
  }

  // Validate address field
 const addressValue = addressInput.value.trim();
  if (!addressValue.match(/^[a-zA-Z0-9\s,'-]*$/)) {
    alert('Address must contain only letters, numbers, spaces, commas, apostrophes, and hyphens');
    return;
  }

  // Check if all fields are not empty
 
  if (
    fullNameValue === '' ||
    emailInput.value.trim() === '' ||
    passwordValue === '' ||
    genderInput.value.trim() === '' ||
    addressValue === '' ||
    phoneValue === '' ||
    dateOfBirthInput.value.trim() === ''
  ) {
    alert('All fields are required');
    return;
  }
  // Submit the form if all validations passed
  form.submit();

  alert("Form submitted!");
});