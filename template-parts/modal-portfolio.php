<?php
    $doc = new domDocument();

    $doc->loadHTML('index.html');
?>
<!-- The Modal -->
<div id="myModal" class="modal" >

  <!-- Modal content -->
    <div class="modal__modal-content">
        
        <img class="portfolio-modal-img image-aspect-ratio image-aspect-ratio__17-10" src="" alt="<?php echo $portfolio_image_alt ?>">
        <div class="modal__modal-content-box">
            <p class="portfolio__modal-title" id="output"></p>
            <span class="modal__close-btn">&times;</span>
        </div>
        
    </div>

</div>