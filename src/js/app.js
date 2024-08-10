
document.addEventListener('DOMContentLoaded', function() {
  evenListeners();

  darkMode();
});

function darkMode() {
  // lee las preferencias del usuario e inicia la pagina con dark-mode
  const prefiereDarkMode = window.matchMedia('((prefers-color-scheme: dark)');
  console.log(prefiereDarkMode.matches);

  if(prefiereDarkMode.matches){
    document.body.classList.add('dark-mode');
  } else {
    document.body.classList.remove('dark-mode');
  }
  // Si el usuario cambia sus preferencias de modo dark a claro y viceversa se leen los cambios y se aplican
  prefiereDarkMode.addEventListener('change', function() {
    if(prefiereDarkMode.matches){
      document.body.classList.add('dark-mode');
  } else {
    document.body.classList.remove('dark-mode');
  }
    

  const botonDarkMode= document.querySelector('.dark-mode-boton');
  botonDarkMode.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
  })
}

function evenListeners() {
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
  const navegacion = document.querySelector('.navegacion');
  navegacion.classList.toggle('mostrar')

  const tache = document.querySelector('.mobile-menu');
  tache.classList.toggle('close')
  
};
