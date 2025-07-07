document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".contact-form");
  const fields = {
    name: document.getElementById("name"),
    email: document.getElementById("email"),
    phone: document.getElementById("phone"),
    source: document.getElementById("source"),
    message: document.getElementById("message"),
  };

  // Create error elements
  Object.values(fields).forEach((field) => {
    const error = document.createElement("div");
    error.className = "error-message";
    field.parentNode.insertBefore(error, field.nextSibling);
  });

  /**
   * Validates that the name field is not empty.
   * @return {boolean} True if the name field contains a non-empty value; otherwise, false.
   */
  function validateName() {
    if (!fields.name.value.trim()) {
      showError(fields.name, "Name is required");
      return false;
    }
    clearError(fields.name);
    return true;
  }

  /**
   * Validates the email input field for presence and correct email format.
   * @returns {boolean} True if the email field is non-empty and matches the standard email pattern; otherwise, false.
   */
  function validateEmail() {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!fields.email.value.trim()) {
      showError(fields.email, "Email is required");
      return false;
    }
    if (!emailRegex.test(fields.email.value)) {
      showError(fields.email, "Invalid email format");
      return false;
    }
    clearError(fields.email);
    return true;
  }

  /**
   * Validates that the phone field is non-empty and matches the format XX-XXX-XXXXXX.
   * Displays an error message if the field is empty or the format is incorrect.
   * @returns {boolean} True if the phone number is valid; otherwise, false.
   */
  function validatePhone() {
    const phoneRegex = /^\d{2}-\d{3}-\d{6}$/;
    if (!fields.phone.value.trim()) {
      showError(fields.phone, "Phone number is required");
      return false;
    }
    if (!phoneRegex.test(fields.phone.value)) {
      showError(fields.phone, "Format: 92-XXX-XXXXXX");
      return false;
    }
    clearError(fields.phone);
    return true;
  }

  /**
   * Validates that a selection has been made in the source field.
   * Displays an error message if no option is selected.
   * @return {boolean} True if a selection is made; otherwise, false.
   */
  function validateSource() {
    if (fields.source.value === "") {
      showError(fields.source, "Please select an option");
      return false;
    }
    clearError(fields.source);
    return true;
  }

  /**
   * Validates that the message field is not empty.
   * @return {boolean} True if the message field contains text; otherwise, false.
   */
  function validateMessage() {
    if (!fields.message.value.trim()) {
      showError(fields.message, "Message is required");
      return false;
    }
    clearError(fields.message);
    return true;
  }

  /**
   * Displays a validation error message for a form field and applies error styling.
   * @param {HTMLElement} field - The input field to display the error for.
   * @param {string} message - The error message to show.
   */
  function showError(field, message) {
    const errorElement = field.nextElementSibling;
    errorElement.textContent = message;
    errorElement.style.display = "block";
    field.classList.add("input-error");
  }

  /**
   * Removes the error message and error styling from the specified input field.
   * @param {HTMLElement} field - The input field whose error state should be cleared.
   */
  function clearError(field) {
    const errorElement = field.nextElementSibling;
    errorElement.textContent = "";
    errorElement.style.display = "none";
    field.classList.remove("input-error");
  }

  // Event listeners
  fields.name.addEventListener("input", validateName);
  fields.email.addEventListener("input", validateEmail);
  fields.phone.addEventListener("input", validatePhone);
  fields.source.addEventListener("change", validateSource);
  fields.message.addEventListener("input", validateMessage);

  form.addEventListener("submit", function (e) {
    let isValid = true;

    if (!validateName()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validatePhone()) isValid = false;
    if (!validateSource()) isValid = false;
    if (!validateMessage()) isValid = false;

    if (!isValid) {
      e.preventDefault();
    }
  });
});
