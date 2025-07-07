document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".signup-form");
  const inputs = {
    name: document.getElementById("name"),
    email: document.getElementById("email"),
    password: document.getElementById("password"),
    confirm_password: document.getElementById("confirm_password"),
    usertype: document.querySelectorAll('input[name="usertype"]'),
  };

  // Create error elements
  const errors = {};
  Object.keys(inputs).forEach((key) => {
    if (key !== "usertype") {
      errors[key] = document.createElement("div");
      errors[key].className = "error-message";
      inputs[key].parentNode.insertBefore(errors[key], inputs[key].nextSibling);
    }
  });

  // Radio button error
  const radioGroup = document.querySelector(".radio-group");
  const radioError = document.createElement("div");
  radioError.className = "radio-error";
  radioGroup.appendChild(radioError);

  /**
   * Validates that the name input field is not empty.
   * @return {boolean} True if the name is provided; otherwise, false.
   */
  function validateName() {
    if (!inputs.name.value.trim()) {
      showError(errors.name, "Name is required", inputs.name);
      return false;
    }
    clearError(errors.name, inputs.name);
    return true;
  }

  /**
   * Validates the email input field for presence and correct email format.
   * @return {boolean} True if the email is non-empty and matches a valid email pattern; otherwise, false.
   */
  function validateEmail() {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!inputs.email.value.trim()) {
      showError(errors.email, "Email is required", inputs.email);
      return false;
    }
    if (!emailRegex.test(inputs.email.value)) {
      showError(
        errors.email,
        "Please enter a valid email address",
        inputs.email
      );
      return false;
    }
    clearError(errors.email, inputs.email);
    return true;
  }

  /**
   * Validates the password input field for presence and minimum length.
   * Displays an error if the password is empty or shorter than 6 characters.
   * @returns {boolean} True if the password is valid; otherwise, false.
   */
  function validatePassword() {
    if (!inputs.password.value.trim()) {
      showError(errors.password, "Password is required", inputs.password);
      return false;
    }
    if (inputs.password.value.length < 6) {
      showError(
        errors.password,
        "Password must be at least 6 characters",
        inputs.password
      );
      return false;
    }
    clearError(errors.password, inputs.password);
    return true;
  }

  /**
   * Validates that the confirm password field is filled and matches the password field.
   * @return {boolean} True if the confirm password is provided and matches the password; otherwise, false.
   */
  function validateConfirmPassword() {
    if (!inputs.confirm_password.value.trim()) {
      showError(
        errors.confirm_password,
        "Please confirm your password",
        inputs.confirm_password
      );
      return false;
    }
    if (inputs.password.value !== inputs.confirm_password.value) {
      showError(
        errors.confirm_password,
        "Passwords do not match",
        inputs.confirm_password
      );
      return false;
    }
    clearError(errors.confirm_password, inputs.confirm_password);
    return true;
  }

  /**
   * Validates that a user type radio button is selected.
   * @return {boolean} True if a user type is selected; otherwise, false.
   */
  function validateUserType() {
    const selected = [...inputs.usertype].some((radio) => radio.checked);
    if (!selected) {
      radioError.textContent = "Please select a user type";
      radioError.style.display = "block";
      return false;
    }
    radioError.style.display = "none";
    return true;
  }

  /**
   * Displays an error message and applies error styling to the specified input element.
   * @param {HTMLElement} element - The element where the error message will be shown.
   * @param {string} message - The error message to display.
   * @param {HTMLElement} input - The input element to which error styling will be applied.
   */
  function showError(element, message, input) {
    element.textContent = message;
    element.style.display = "block";
    input.classList.add("input-error");
  }

  /**
   * Clears the error message and error styling from the specified input field.
   * @param {HTMLElement} element - The element displaying the error message.
   * @param {HTMLElement} input - The input field to remove error styling from.
   */
  function clearError(element, input) {
    element.textContent = "";
    element.style.display = "none";
    input.classList.remove("input-error");
  }

  // Event listeners
  inputs.name.addEventListener("input", validateName);
  inputs.email.addEventListener("input", validateEmail);
  inputs.password.addEventListener("input", () => {
    validatePassword();
    validateConfirmPassword();
  });
  inputs.confirm_password.addEventListener("input", validateConfirmPassword);
  inputs.usertype.forEach((radio) =>
    radio.addEventListener("change", validateUserType)
  );

  form.addEventListener("submit", function (e) {
    let isValid = true;

    if (!validateName()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validatePassword()) isValid = false;
    if (!validateConfirmPassword()) isValid = false;
    if (!validateUserType()) isValid = false;

    if (!isValid) {
      e.preventDefault();
    }
  });
});
