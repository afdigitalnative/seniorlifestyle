<?php

// Function to handle the thumbnail request
function get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}

function sl_social_buttons($content) {
    global $post;

    if(is_singular()){

        // Get current page URL
        $sl_url = urlencode(get_permalink());

        // Get current page title
        $sl_title = str_replace( ' ', '%20', get_the_title());

        // Get Post Thumbnail for pinterest
        $sl_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());

        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$sl_title.'&amp;url='.$sl_url.'&amp;via=SeniorLifestyle';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sl_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sl_url.'&amp;title='.$sl_title;

       if(!empty($sl_thumb)) {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sl_url.'&amp;media='.$sl_thumb[0].'&amp;description='.$sl_title;
        }
        else {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sl_url.'&amp;description='.$sl_title;
        }

        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sl_url.'&amp;media='.$sl_thumb[0].'&amp;description='.$sl_title;

        // Add sharing button at the end of page/page content
        $content .= '<div class="social-box"><div class="social-btn">';
        $content .= '<a class="col-2 sbtn s-twitter" href="'. $twitterURL .'" target="_blank" rel="nofollow"></a>';
        $content .= '<a class="col-2 sbtn s-facebook" href="'.$facebookURL.'" target="_blank" rel="nofollow"></a>';
        $content .= '<a class="col-2 sbtn s-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank" rel="nofollow"></a>';
        $content .= '<a class="col-2 sbtn s-linkedin" href="'.$linkedInURL.'" target="_blank" rel="nofollow"></a>';
        $content .= '</div></div>';

        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
// Enable the_content to automatically show social buttons below the post.
// add_filter( 'the_content', 'sl_social_buttons');

// This will create a wordpress shortcode [social].
// Please it in any widget and social buttons should appear.
// You will need to enabled shortcode execution.
add_shortcode('social','sl_social_buttons');