<?php
$facebook_page_id = '1040841009280157';
$access_token = '1720185964896931|UX2KY6BLa4DZ7CR2rdkdAU0LjJs';
$number_of_posts = 5;
 
/***************************************************/
/***************************************************/
/***************************************************/
 
// $json_content = file_get_contents('https://graph.facebook.com/.$facebook_page_id./feed?access_token=.$access_token');

$json_content = file_get_contents('https://graph.facebook.com/'.$facebook_page_id.'/feed?access_token='.$access_token);

$raw_data = json_decode($json_content);
$i=0; 
foreach ($raw_data->data as $feed ) {
       $feed_id = explode(“_”, $feed->id);
       if (!empty($feed->message)) { 
              $i++;
              if ($i<($number_of_posts+1)) {
?>
 
<div class=”fb_update”>
<?php if (!empty($feed->likes->count)) { ?>
        <div class=”fb_likes”>
              <?php echo $feed->likes->count; ?>
        </div>
<?php }       ?>  
<?php if (!empty($feed->created_time)) { ?>
        <div class=”fb_date”>
              <?php echo date('F j, Y', strtotime($feed->created_time)); ?>
        </div>
<?php }       ?>
       <div class=”fb_message”>
        <?php echo $feed->message; ?>
       </div>       
</div>
 
<?php } ?>
<?php } ?>
<?php } ?>