var btnErroLogin = document.getElementById('btnMostrarErro');
var errorOccult = document.querySelector('.error-ocult');

btnErroLogin.addEventListener('click', function() {
    
  if(errorOccult.style.display == 'block') {
      errorOccult.style.display = 'none';
  } else {
      errorOccult.style.display = 'block';
  }
});
