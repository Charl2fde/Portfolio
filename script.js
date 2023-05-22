// bar de progression de la page

window.addEventListener('scroll', function () {
  const scrollPosition = document.documentElement.scrollTop;
  const windowHeight = document.documentElement.clientHeight;
  const fullHeight = document.documentElement.scrollHeight;
  const scrolled = (scrollPosition / (fullHeight - windowHeight)) * 100;
  document.getElementById('progressBar').style.width = scrolled + '%';
});

window.addEventListener('scroll', function () {
  const scrollPosition = document.documentElement.scrollTop;
  const windowHeight = document.documentElement.clientHeight;
  const fullHeight = document.documentElement.scrollHeight;
  const scrolled = (scrollPosition / (fullHeight - windowHeight)) * 100;
  document.getElementById('progressBar2').style.width = scrolled + '%';
});

const downloadLinks = document.querySelectorAll("[data-download]");

downloadLinks.forEach(button => {
  const id = button.dataset.download;
  const image = document.getElementById(id);
  const a = document.createElement("a");

  a.href = imgage.src;
  a.download = "";
  a.style.display = "none";
})

// menu burger qui affiche le menu au clic
const menuHamburger = document.querySelector(".menu-burger")
const navLinks = document.querySelector("ul")

menuHamburger.addEventListener('click', () => {
  navLinks.classList.toggle('mobile-menu')
})

// pas de scroll pendant que le menu burger est affiché
const menuBurger = document.querySelector('.menu-burger');
const body = document.querySelector('body');

menuBurger.addEventListener('click', function () {
  body.classList.toggle('overflow-hidden');
});

// menu déroulant veille numérique

document.addEventListener('DOMContentLoaded', function () {
  var dropdownButtons = document.querySelectorAll('.menu-der .der-content');

  dropdownButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      var dropdownContent = this.nextElementSibling;
      // var icon = this.querySelector('i');

      // Vérifier si le menu est déjà ouvert
      if (dropdownContent.style.display === 'block') {
        dropdownContent.style.display = 'none';
      } else {
        closeAllDropdowns();
        dropdownContent.style.display = 'block';
      }
    });
  });
function closeAllDropdowns() {
    var dropdownContents = document.querySelectorAll('.menu-der .description');
    // var icons = document.querySelectorAll('.blog-dropdown .dropdown-btn i');

    dropdownContents.forEach(function (content) {
      content.style.display = 'none';
    });
  }
});


