document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".signup-form");
  const inputs = {
    name: document.getElementById("name"),
    email: document.getElementById("email"),
    phone: document.getElementById("phone"),
    resume: document.querySelector('input[name="resume"]'),
  };

  // Create error elements
  Object.values(inputs).forEach((input) => {
    const error = document.createElement("div");
    error.className = "error-message";
    input.parentNode.insertBefore(error, input.nextSibling);
  });

  /**
   * Validates that the name input field is not empty.
   * @return {boolean} True if the name is provided; otherwise, false.
   */
  function validateName() {
    if (!inputs.name.value.trim()) {
      showError(inputs.name, "Name is required");
      return false;
    }
    clearError(inputs.name);
    return true;
  }

  /**
   * Validates the email input field for presence and correct email format.
   * @return {boolean} True if the email is non-empty and matches the standard email pattern; otherwise, false.
   */
  function validateEmail() {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!inputs.email.value.trim()) {
      showError(inputs.email, "Email is required");
      return false;
    }
    if (!emailRegex.test(inputs.email.value)) {
      showError(inputs.email, "Invalid email format");
      return false;
    }
    clearError(inputs.email);
    return true;
  }

  /**
   * Validates the phone input to ensure it is not empty and matches the format XX-XXX-XXXXXX.
   * @returns {boolean} True if the phone input is valid; otherwise, false.
   */
  function validatePhone() {
    const phoneRegex = /^\d{2}-\d{3}-\d{6}$/;
    if (!inputs.phone.value.trim()) {
      showError(inputs.phone, "Phone number is required");
      return false;
    }
    if (!phoneRegex.test(inputs.phone.value)) {
      showError(inputs.phone, "Format: 92-XXX-XXXXXX");
      return false;
    }
    clearError(inputs.phone);
    return true;
  }

  /**
   * Validates the resume file input to ensure a file is selected, is a PDF, and is under 5MB.
   * @return {boolean} True if the resume input passes all checks; otherwise, false.
   */
  function validateResume() {
    if (!inputs.resume.files.length) {
      showError(inputs.resume, "Resume is required");
      return false;
    }

    const file = inputs.resume.files[0];
    if (file.type !== "application/pdf") {
      showError(inputs.resume, "Only PDF files are allowed");
      return false;
    }

    if (file.size > 5 * 1024 * 1024) {
      // 5MB
      showError(inputs.resume, "File size must be less than 5MB");
      return false;
    }

    clearError(inputs.resume);
    return true;
  }

  /**
   * Displays an error message for the specified input field and applies error styling.
   * @param {HTMLElement} input - The input element to display the error for.
   * @param {string} message - The error message to show.
   */
  function showError(input, message) {
    const errorElement = input.nextElementSibling;
    errorElement.textContent = message;
    errorElement.style.display = "block";
    input.classList.add("input-error");
  }

  /**
   * Clears the error message and error styling for the specified input field.
   * Hides the associated error message element and removes the error CSS class from the input.
   */
  function clearError(input) {
    const errorElement = input.nextElementSibling;
    errorElement.textContent = "";
    errorElement.style.display = "none";
    input.classList.remove("input-error");
  }

  // Event listeners
  inputs.name.addEventListener("input", validateName);
  inputs.email.addEventListener("input", validateEmail);
  inputs.phone.addEventListener("input", validatePhone);
  inputs.resume.addEventListener("change", validateResume);

  form.addEventListener("submit", function (e) {
    let isValid = true;

    if (!validateName()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validatePhone()) isValid = false;
    if (!validateResume()) isValid = false;

    if (!isValid) {
      e.preventDefault();
    }
  });
});
