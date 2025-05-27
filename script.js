// Signup form validation
document.addEventListener('DOMContentLoaded', function () {
    const signupForm = document.querySelector('form[action="index.php"]');
    if (signupForm) {
        signupForm.addEventListener('submit', function (e) {
            const name = signupForm.querySelector('input[name="name"]').value.trim();
            const email = signupForm.querySelector('input[name="email"]').value.trim();
            const phone = signupForm.querySelector('input[name="phone"]').value.trim();
            const city = signupForm.querySelector('input[name="city"]').value.trim();
            const password = signupForm.querySelector('input[name="pass"]').value.trim();

            // Basic checks
            if (name === '' || city === '') {
                alert('Name and City are required!');
                e.preventDefault();
                return;
            }

            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                alert('Please enter a valid email address.');
                e.preventDefault();
                return;
            }

            const phonePattern = /^[0-9]{10}$/;
            if (!phone.match(phonePattern)) {
                alert('Phone number must be exactly 10 digits.');
                e.preventDefault();
                return;
            }

            if (password.length < 6) {
                alert('Password must be at least 6 characters long.');
                e.preventDefault();
                return;
            }
        });
    }
});
