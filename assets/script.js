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

function passhow(event, doc) {
  event.preventDefault();
  if (doc.type == 'password') {
      doc.type = 'text';
  } else {
      doc.type = 'password';
  }
}

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KF6CNR83B8');

