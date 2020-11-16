/* To Open & close the slide menu's */
function openSlideMenu() {
  document.getElementById("side-nav").style.width = "250px";
  document.getElementById("header-container").style.marginLeft = "250px";
}
function closeSlideMenu() {
  document.getElementById("side-nav").style.width = "0px";
  document.getElementById("header-container").style.marginLeft = "0";
}

document
  .getElementById("toggle-btn")
  .addEventListener("mouseover", function () {
    document.querySelector(".stayingin-show").className = "stayingin-show-show";
  });
document.getElementById("toggle-btn").addEventListener("click", function () {
  document.querySelector(".stayingin-show").className = "stayingin-show-show";
});
// document.getElementById("toggle-btn").addEventListener("mouseout", function () {
//    document.querySelector(".stayingin-show-show").className = "stayingin-show";
// });
// document.getElementById("nav-svg").addEventListener("click", function () {
//   document.getElementById("side-nav").style.width = "250px";
//   document.getElementById("header-container").style.marginLeft = "250px";
// });
document.getElementById("btn-login").addEventListener("click", function () {
  document.querySelector(".bg-modal").style.display = "flex";
});

document.querySelector(".close").addEventListener("click", function () {
  document.querySelector(".bg-modal").style.display = "none";
});

document.getElementById("btn-signup").addEventListener("click", function () {
  document.querySelector(".bg-modal-signup").style.display = "flex";
});

document.querySelector(".close-signup").addEventListener("click", function () {
  document.querySelector(".bg-modal-signup").style.display = "none";
});
