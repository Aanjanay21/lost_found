document.getElementById("loginForm").addEventListener("submit", async (e) => {
    e.preventDefault();
    
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
        await auth.signInWithEmailAndPassword(email, password);
        alert("Login successful!");
        window.location.href = "index.html";
    } catch (error) {
        alert(error.message);
    }
});

document.getElementById("signup").addEventListener("click", async () => {
    const email = prompt("Enter Email:");
    const password = prompt("Enter Password:");
    
    try {
        await auth.createUserWithEmailAndPassword(email, password);
        alert("Signup successful!");
    } catch (error) {
        alert(error.message);
    }
});
