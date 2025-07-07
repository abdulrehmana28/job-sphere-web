document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".signup-form");
  const inputs = {
    company_name: document.getElementById("company_name"),
    job_level: document.getElementById("job_level"),
    job_type: document.getElementById("job_type"),
    job_title: document.getElementById("job_title"),
    job_description: document.getElementById("We need a Product Designer"),
    job_salary: document.getElementById("job_salary"),
    company_logo: document.querySelector('input[name="company_logo"]'),
  };

  // Create error elements
  Object.values(inputs).forEach((input) => {
    const error = document.createElement("div");
    error.className = "error-message";
    input.parentNode.insertBefore(error, input.nextSibling);
  });

  // Validation functions
  function validateCompanyName() {
    if (!inputs.company_name.value.trim()) {
      showError(inputs.company_name, "Company name is required");
      return false;
    }
    clearError(inputs.company_name);
    return true;
  }

  function validateJobLevel() {
    if (!inputs.job_level.value.trim()) {
      showError(inputs.job_level, "Job level is required");
      return false;
    }
    clearError(inputs.job_level);
    return true;
  }

  function validateJobType() {
    if (!inputs.job_type.value.trim()) {
      showError(inputs.job_type, "Job type is required");
      return false;
    }
    clearError(inputs.job_type);
    return true;
  }

  function validateJobTitle() {
    if (!inputs.job_title.value.trim()) {
      showError(inputs.job_title, "Job title is required");
      return false;
    }
    clearError(inputs.job_title);
    return true;
  }

  function validateJobDescription() {
    if (!inputs.job_description.value.trim()) {
      showError(inputs.job_description, "Job description is required");
      return false;
    }
    clearError(inputs.job_description);
    return true;
  }

  function validateJobSalary() {
    const salaryRegex = /^\d+k$/;
    if (!inputs.job_salary.value.trim()) {
      showError(inputs.job_salary, "Job salary is required");
      return false;
    }
    if (!salaryRegex.test(inputs.job_salary.value)) {
      showError(inputs.job_salary, 'Format: 105k (number followed by "k")');
      return false;
    }
    clearError(inputs.job_salary);
    return true;
  }

  function validateCompanyLogo() {
    if (inputs.company_logo.files.length > 0) {
      const file = inputs.company_logo.files[0];
      const allowedTypes = ["image/jpeg", "image/png", "image/gif"];
      const maxSize = 2 * 1024 * 1024; // 2MB

      if (!allowedTypes.includes(file.type)) {
        showError(inputs.company_logo, "Only JPG, PNG & GIF files are allowed");
        return false;
      }
      if (file.size > maxSize) {
        showError(inputs.company_logo, "File size must be less than 2MB");
        return false;
      }
    }
    clearError(inputs.company_logo);
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
  inputs.company_name.addEventListener("input", validateCompanyName);
  inputs.job_level.addEventListener("input", validateJobLevel);
  inputs.job_type.addEventListener("input", validateJobType);
  inputs.job_title.addEventListener("input", validateJobTitle);
  inputs.job_description.addEventListener("input", validateJobDescription);
  inputs.job_salary.addEventListener("input", validateJobSalary);
  inputs.company_logo.addEventListener("change", validateCompanyLogo);

  form.addEventListener("submit", function (e) {
    let isValid = true;

    if (!validateCompanyName()) isValid = false;
    if (!validateJobLevel()) isValid = false;
    if (!validateJobType()) isValid = false;
    if (!validateJobTitle()) isValid = false;
    if (!validateJobDescription()) isValid = false;
    if (!validateJobSalary()) isValid = false;
    if (!validateCompanyLogo()) isValid = false;

    if (!isValid) {
      e.preventDefault();
    }
  });
});
