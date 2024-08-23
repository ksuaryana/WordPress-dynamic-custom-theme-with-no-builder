  
/*Modal Start*/
function ModalPopup(){
  let modal = document.getElementById("myModal");

  // Get the button that opens the modal
  let btn = document.querySelectorAll(".open-modal-button");

  btn.forEach(element => {
    // When the user clicks the button, open the modal 
    element.onclick = function() {
      modal.style.display = "block";
      
      const target_title = element.getAttribute("data-title");
      const target_image = element.getAttribute("data-image");
      
      const target_modal_title = document.querySelector(".portfolio__modal-title");
      const target_modal_image = document.querySelector(".portfolio-modal-img");
      
      target_modal_title.innerHTML = target_title;
      target_modal_image.src = target_image;

    }

  });

  // Get the <span> element that closes the modal
  let span = document.getElementsByClassName("modal__close-btn")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}
/*Modal End*/
  
/* Trigger start */
document.addEventListener("DOMContentLoaded", (event) => {
  ModalPopup();
});
