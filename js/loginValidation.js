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

  function showError(element, message) {
    element.textContent = message;
    element.style.display = "block";
    element.previousElementSibling.classList.add("input-error");
  }

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
