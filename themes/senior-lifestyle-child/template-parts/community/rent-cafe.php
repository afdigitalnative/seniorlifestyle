<?php

global $post;

$general_information = get_field('general_information') ? get_field('general_information') : array();
//$is_multiple = false;
//if(isset($general_information['button_text']) && isset($general_information['button_text_2']) && $general_information['button_text']!="" && $general_information['button_text_2']!=""){
//    $is_multiple = true;
//}
//
//if($is_multiple==true){
if(isset($general_information['community_rent_cafe']) && $general_information['community_rent_cafe']!=""){
    $text1 = "";
    $text2 = "";
    if(isset($general_information['button_text']) && $general_information['button_text']!=""){
        $text1 = $general_information['button_text'].'<br>';
    }
    if(isset($general_information['button_text_2']) && $general_information['button_text_2']!=""){
        $text2 = $general_information['button_text_2'].'<br>';
    }
?>

<section id="rentcafe_section" class="rentcafe-section">
    <div class="container">
        <hr>
        <img src="<?= get_stylesheet_directory_uri() . "/assets/img/logos/rentcafe-logo.png" ?>" alt="rent cafe logo"/>
        <h3>Log in here to pay your rent online</h3>
        <a class="btn-primary" target="_blank" href="<?= $general_information['community_rent_cafe'] ?>"><?= $text1 ?><i><span class="font-normal">- Pay Rent -</span></i></a><br><br>
        <?php if(isset($general_information['community_rent_cafe_2']) && $general_information['community_rent_cafe_2']!=""){ ?>
        
        <a class="btn-primary" target="_blank" href="<?= $general_information['community_rent_cafe_2'] ?>"><?= $text2 ?><i><span class="font-normal">- Pay Rent -</span></i></a><br><br>
            <?php } ?>
        
</div>
</section>
<?php
}
?>
