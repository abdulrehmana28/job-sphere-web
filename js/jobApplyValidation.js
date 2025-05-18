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

  // Validation functions
  function validateName() {
    if (!inputs.name.value.trim()) {
      showError(inputs.name, "Name is required");
      return false;
    }
    clearError(inputs.name);
    return true;
  }

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

  function showError(input, message) {
    const errorElement = input.nextElementSibling;
    errorElement.textContent = message;
    errorElement.style.display = "block";
    input.classList.add("input-error");
  }

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
