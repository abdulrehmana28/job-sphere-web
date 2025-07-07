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

  // Validation functions
  function validateName() {
    if (!fields.name.value.trim()) {
      showError(fields.name, "Name is required");
      return false;
    }
    clearError(fields.name);
    return true;
  }

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

  function validateSource() {
    if (fields.source.value === "") {
      showError(fields.source, "Please select an option");
      return false;
    }
    clearError(fields.source);
    return true;
  }

  function validateMessage() {
    if (!fields.message.value.trim()) {
      showError(fields.message, "Message is required");
      return false;
    }
    clearError(fields.message);
    return true;
  }

  function showError(field, message) {
    const errorElement = field.nextElementSibling;
    errorElement.textContent = message;
    errorElement.style.display = "block";
    field.classList.add("input-error");
  }

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
