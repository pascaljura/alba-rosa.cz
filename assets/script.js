function signup(close) {
  document.getElementById('popupLogin').style = 'display: none';
  let popup = document.getElementById('popupSignup');
  if (close) popup.style = 'display: none';
  else popup.style = 'display: flex';
}

function login(close) {
  document.getElementById('popupSignup').style = 'display: none';
  let popup = document.getElementById('popupLogin');
  if (close) popup.style = 'display: none';
  else popup.style = 'display: flex';
}

function passhow(doc) {
  if (doc.type == 'password') doc.type = 'text';
  else doc.type = 'password';
}
