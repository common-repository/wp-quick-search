<?php
function getWqsApiUrl()
{
    if(WQS_API_URL)
    {
        return WQS_API_URL;
    }
}
function getWqsCurrentUrl()
{
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($actual_link != null) {
        return $actual_link;
    }
}
add_action('init','getWqsApi');
function getWqsApi()
{
    if(getWqsCurrentUrl()==WQS_API_URL)
    {

        $args = array(
            'post_type' => array('post'),
            'posts_per_page' => -1
        );
        $mainObj=array();
        $loop = new WP_Query($args);
        while ($loop->have_posts()) :

            $tempArray=[];
            $loop->the_post();

            $title= get_the_title();
            $link= get_the_permalink();
            $date= get_the_date();
            $image=wp_get_attachment_url(get_post_thumbnail_id($post->ID));

            $tempArray['title']=$title;
            $tempArray['date']=$date;
            $tempArray['image']=$image;
            $tempArray['link']=$link;

            array_push($mainObj,$tempArray);
        endwhile;

        header('Content-Type: application/json');
        print_r(json_encode($mainObj,JSON_PRETTY_PRINT));
        exit;
    }

}

?>