function signup(close) {
  document.getElementById("popupLogin").style = "display: none";
  let popup = document.getElementById("popupSignup");
  if (close) popup.style = "display: none";
  else popup.style = "display: flex";
}

function login(close) {
  document.getElementById("popupSignup").style = "display: none";
  let popup = document.getElementById("popupLogin");
  if (close) popup.style = "display: none";
  else popup.style = "display: flex";
}

function togglePassword_sign() {
  var passwordInput_sign = document.getElementById("signpas");
  var icon_sign = document.getElementById("toggle_pwd_sign").querySelector("i");
  if (passwordInput_sign.type === "password") {
    passwordInput_sign.type = "text";
    icon_sign.classList.remove("fa-eye");
    icon_sign.classList.add("fa-eye-slash");
  } else {
    passwordInput_sign.type = "password";
    icon_sign.classList.remove("fa-eye-slash");
    icon_sign.classList.add("fa-eye");
  }
}

function togglePassword_log() {
  var passwordInput_log = document.getElementById("logpas");
  var icon_log = document.getElementById("toggle_pwd_log").querySelector("i");
  if (passwordInput_log.type === "password") {
    passwordInput_log.type = "text";
    icon_log.classList.remove("fa-eye");
    icon_log.classList.add("fa-eye-slash");
  } else {
    passwordInput_log.type = "password";
    icon_log.classList.remove("fa-eye-slash");
    icon_log.classList.add("fa-eye");
  }
}

window.dataLayer = window.dataLayer || [];
function gtag() {
  dataLayer.push(arguments);
}
gtag("js", new Date());

gtag("config", "G-KF6CNR83B8");
