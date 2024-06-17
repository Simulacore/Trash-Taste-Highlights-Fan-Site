const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
    document.getElementById('verification-code').innerText = "Your verification code is: 12345";
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
    document.getElementById('verification-code').innerText = "";
});
