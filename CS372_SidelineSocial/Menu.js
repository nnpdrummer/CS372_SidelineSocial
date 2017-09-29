/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function showMenu() {
    document.getElementById("dropdown").classList.toggle("show_menu");
}

/* Close the dropdown menu if the user clicks outside of it */
window.onclick = function(event) {
  if (!event.target.matches('.account_button')) {

    var dropdowns = document.getElementsByClassName("account_menu");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show_menu')) {
        openDropdown.classList.remove('show_menu');
      }
    }
  }
}