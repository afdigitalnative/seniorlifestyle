<?php
    /*
     *
     * BLOG SIDEBAR
     *
     * Note: This sidebar is not dynamic and has not been registerd as a widget,
     * but it can be at a later time.
     *
     */
$search_text="";
     global $MYSTATE;
     global $MYCITY;
     
     if($MYSTATE!="" && $MYCITY!=""){
         $search_text.='<h4>Find a Community in <br>'. stripslashes($MYCITY) . ', ' . $MYSTATE . '</h4>';
         $search_text.='<p class="txt-small">... or another location</p>';
         $search_link = '/find-community/?place=' . urlencode(strtolower($MYCITY) . ',' . strtolower($MYSTATE));
     }else if($MYSTATE!=""){
         $search_text.='<h4>Find a Community in ' . $MYSTATE . '</h4>';
         $search_text.='<p class="txt-small">... or another location</p>';
         $search_link = '/find-community/?place=' . urlencode(strtolower($MYSTATE));
     }else{
         $search_text.='<h4>Find a Community</h4>';
     }
?>
<aside class="blog-sidebar">
    <div class="location-callout-box-basic">
        <div class="callout-content">
            <?= $search_text ?>
            <a href="<?= $search_link ?>" class="btn-primary-lightblue">Search Now</a>
        </div>
    </div>
</aside>