function signup(close) {
  document.getElementById('popupLogin').style = 'display: none';
  let popup = document.getElementById('popupSignup');
  if (close) popup.style = 'display: none';
  else popup.style = 'display: block';
}

function login(close) {
  document.getElementById('popupSignup').style = 'display: none';
  let popup = document.getElementById('popupLogin');
  if (close) popup.style = 'display: none';
  else popup.style = 'display: block';
}