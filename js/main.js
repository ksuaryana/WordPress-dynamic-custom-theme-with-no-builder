/* Burger menu start */
function burgerBtn(){
    let menuToggle = document.querySelector(".header__menu-toggle");
    let nav = document.querySelector(".menu-item");
    
  
    // Toggle menu on button click with fade transition
    menuToggle.addEventListener("click", function() {
        let expanded = menuToggle.getAttribute("aria-expanded") === "true" || false;
        menuToggle.setAttribute("aria-expanded", !expanded);
  
        // Add/remove 'open' class with fade transition
        if (expanded) {
            nav.classList.remove('open');
            document.getElementById("burger-close-btn").innerHTML = '<span class="hover-scale">&#9776;</span>';
          
        } else {
            nav.classList.add('open');
            document.getElementById("burger-close-btn").innerHTML = '<span class="hover-scale">&#x2715;</span>';

        }

    });
  }
/* Burger menu end */
  
/* Trigger start */
document.addEventListener("DOMContentLoaded", (event) => {
  burgerBtn();
});