<?php

add_shortcode('show_faculty', function() {
	echo '<h1>HELLO!!!!</h1>';
	
um_fetch_user(5);
echo um_user_profile_url();
um_reset_user();

echo '<h1>BYE33</h1>';
	
global $user;
$user_info = um_fetch_user( $user->id );


$values = get_field('choose_directory');
if($values)
{ 
	foreach($values as $value)	{

?>


<?php 
$direct_link = $value['ID'];
echo $direct_link;

echo 'here is the link';
um_fetch_user('direct_link');
echo um_user_profile_url();
um_reset_user();
?>


<!-- START REPEATER SECTION -->	
<div class="wpb_row vc_inner vc_row    attched-false   vc_row-fluid ">
	<div class="wpb_column vc_column_container vc_col-sm-2">
    	<div class="vc_column-inner ">
        	<div class="wpb_wrapper">
            	<div class="mk-image   align-left border_shadow-frame inside-image " style="margin-bottom:10px">
					<div class="mk-image-holder" style="max-width: 500px;">
                    	<div class="mk-image-inner ">
                        	<img class="lightbox-false" alt="" title="" width="500" height="751" src="https://cohpacmsdev.smca.ucf.edu/wp-content/uploads/2016/06/kenneth_adams.jpg">
                        </div>
                    </div>
					<div class="clearboth"></div>
				</div>
            </div>
        </div>
    </div>
	<div class="wpb_column vc_column_container vc_col-sm-10">
    	<div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div id="text-block-6" class="mk-text-block   ">
                <?php echo um_user_profile_url(); ?> - Profile URL
                    <h3>
                        <a title="<?php echo $value['display_name'] ; ?>" href="https://www.cohpa.ucf.edu/directory/kenneth-adams/" target="_parent"><?php echo $value['display_name'] ; ?></a>
                    </h3>
                    <p><strong>Professor</strong><br>
                        Criminal Justice<br>
                        Phone: <407704051<br>
                        Email: <a title="Contact Kenneth Adams" href="mailto:kenneth.adams@ucf.edu">kenneth.adams@ucf.edu</a>
                    </p>
                    <p>Location: <a title="Map to " href="http://map.ucf.edu/locations/80/health-public-affairs-i/" target="_blank">HPA I</a> Room: 360</p>
    
                    <div class="clearboth"></div>
                </div>
            </div>
        </div>
    </div>	
</div>
<div id="divider-7" class="mk-divider  divider_full_width center shadow_line ">
	<div class="divider-inner">
		<span class="divider-shadow-left"></span>
        <span class="divider-shadow-right"></span>
	</div>
</div>
<div class="clearboth"></div>
<!-- END REPEATER SECTION -->	

<?
	}
}	
	?>
	
<style id='theme-dynamic-styles-inline-css' type='text/css'>
#divider-7 { padding:10px 0 30px; } #divider-7 .divider-inner { } #divider-7 .divider-inner:after { } #divider-7 .divider-shadow-left, #divider-7 .divider-shadow-right { background-image:url(https://cohpacmsdev.smca.ucf.edu/wp-content/themes/jupiter/assets/images/shadow-divider.png); } 
</style>	
	
<?php	
});