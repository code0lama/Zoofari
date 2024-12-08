const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
      document.getElementById("signupForm").addEventListener("submit", function(event) {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var message = document.getElementById("message");
    
        if (password !== confirmPassword) {
            message.innerHTML = "Passwords do not match";
            event.preventDefault(); 
        } else {
            message.innerHTML = ""; 
        }
    });
   
    