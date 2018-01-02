<!-- OG Tags -->
<meta property="og:title" content="<?php echo $title;?>" />
<meta property="og:type" content="<?php echo $type;?>" />
<meta property="og:url" content="<?php echo $url;?>" />
<?php if($image) : ?><meta property="og:image" content="<?php echo $image;?>" /><?php endif;?>
<?php if($admins) : ?><meta property="fb:admins" content="<?php echo $admins?>"/><?php endif;?>
<?php if($appId) : ?><meta property="fb:app_id" content="<?php echo $appId?>" /><?php endif;?>