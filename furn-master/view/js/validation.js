document.getElementById("signup_form").addEventListener("submit", function(event) {
  event.preventDefault();

  const form = event.target;
  const fullNameInput = form.querySelector('#fullname');
  const emailInput = form.querySelector('#email');
  const passwordInput = form.querySelector('#password');
  const addressInput = form.querySelector('#address');
  const phoneInput = form.querySelector('#phone');
  const dateOfBirthInput = form.querySelector('#dateOfBirth');

  const fullNameValue = fullNameInput.value.trim();
  const emailValue = emailInput.value.trim();
  const passwordValue = passwordInput.value.trim();
  //const addressValue = addressInput.value.trim();
  const phoneValue = phoneInput.value.trim();
  const dateOfBirthValue = dateOfBirthInput.value.trim();

  // Validate full name field
  if (!fullNameValue.match(/^[a-zA-Z]+$/)) {
    alert('Full name must contain only letters');
    return;
  }

  // Validate email field
  if (!emailValue.match(/^\S+@\S+\.\S+$/)) {
    alert('Invalid email format');
    return;
  }

  // Validate password field
  if (!passwordValue.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
    alert('Password must contain at least one letter and one number and be at least 8 characters long');
    return;
  }

  // Validate phone field
  if (!phoneValue.match(/^\d{8}$/)) {
    alert('Phone number must contain only 8 digits');
    return;
  }

  // Validate address field
  /*if (!addressValue.match(/^[a-zA-Z0-9\s,'-]*$/)) {
    alert('Address must contain only letters, numbers, spaces, commas, apostrophes, and hyphens');
    return;
  }*/

  // Validate date of birth field
  if (!dateOfBirthValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
    alert('Date of birth must be in YYYY-MM-DD format');
    return;
  }

  // Check if all fields are not empty
  if (
    fullNameValue === '' ||
    emailValue === '' ||
    passwordValue === '' ||
   
    phoneValue === '' ||
    dateOfBirthValue === ''
  ) {
    alert('All fields are required');
    return;
  }

  // Submit the form and redirect to success page
  
  alert('success');
});