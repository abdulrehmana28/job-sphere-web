document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".login-form");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");

  // Create error message elements
  const emailError = document.createElement("div");
  emailError.className = "error-message";
  emailInput.parentNode.insertBefore(emailError, emailInput.nextSibling);

  const passwordError = document.createElement("div");
  passwordError.className = "error-message";
  passwordInput.parentNode.insertBefore(
    passwordError,
    passwordInput.nextSibling
  );

  // Real-time validation
  emailInput.addEventListener("input", validateEmail);
  passwordInput.addEventListener("input", validatePassword);

  /**
   * Validates the email input field for presence and correct email format.
   * Displays an error message if the field is empty or the value is not a valid email address.
   * @returns {boolean} True if the email input is valid; otherwise, false.
   */
  function validateEmail() {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailInput.value.trim()) {
      showError(emailError, "Email is required");
      return false;
    }
    if (!emailRegex.test(emailInput.value)) {
      showError(emailError, "Please enter a valid email address");
      return false;
    }
    clearError(emailError);
    return true;
  }

  /**
   * Validates the password input field for presence and minimum length.
   * Displays an error message if the password is empty or shorter than 6 characters.
   * @returns {boolean} True if the password is valid; otherwise, false.
   */
  function validatePassword() {
    if (!passwordInput.value.trim()) {
      showError(passwordError, "Password is required");
      return false;
    }
    if (passwordInput.value.length < 6) {
      showError(passwordError, "Password must be at least 6 characters");
      return false;
    }
    clearError(passwordError);
    return true;
  }

  /**
   * Displays an error message and visually marks the associated input field as invalid.
   * @param {HTMLElement} element - The error message container element.
   * @param {string} message - The error message to display.
   */
  function showError(element, message) {
    element.textContent = message;
    element.style.display = "block";
    element.previousElementSibling.classList.add("input-error");
  }

  /**
   * Clears the error message and hides the error element for an input field.
   * Also removes the "input-error" CSS class from the associated input element.
   */
  function clearError(element) {
    element.textContent = "";
    element.style.display = "none";
    element.previousElementSibling.classList.remove("input-error");
  }

  form.addEventListener("submit", function (e) {
    let isValid = true;

    if (!validateEmail()) isValid = false;
    if (!validatePassword()) isValid = false;

    if (!isValid) {
      e.preventDefault();
    }
  });
});
