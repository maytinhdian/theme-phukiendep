<div class="header-main">
    <?php 
    // Check if the current page is the home page
    if(is_front_page() || is_home()) {
        //Display the logo
        the_custom_logo();
    }
    
    ?>
</div>