window.addEventListener("scroll", function () {
  var header = document.getElementById("sticky-navbar");
  header.classList.toggle("stickyblack-nav", window.scrollY > 1);
});
