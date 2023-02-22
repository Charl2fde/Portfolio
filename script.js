window.addEventListener('scroll', function() {
    const scrollPosition = document.documentElement.scrollTop;
    const windowHeight = document.documentElement.clientHeight;
    const fullHeight = document.documentElement.scrollHeight;
    const scrolled = (scrollPosition / (fullHeight - windowHeight)) * 100;
    document.getElementById('progressBar').style.width = scrolled + '%';
  });
  