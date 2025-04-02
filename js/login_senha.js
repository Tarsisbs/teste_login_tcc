function togglePassword(id) {
    var passwordInput = document.getElementById(id);
    var toggleIcon = passwordInput.closest(".password-container").querySelector(".toggle-password i");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove("bi-eye");
        toggleIcon.classList.add("bi-eye-slash");
    } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove("bi-eye-slash");
        toggleIcon.classList.add("bi-eye");
    }
}
