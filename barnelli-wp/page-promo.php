<?php
/*
  Template Name: Quảng cáo Đặt bàn
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <?php
        if (YSettings::g('barnelli_seo_enabled', 'no')):
            ?>
            <meta name="description" content="<?php echo YSettings::g('barnelli_seo_description', ''); ?>">
            <meta name="keywords" content="<?php echo YSettings::g('barnelli_seo_keywords', ''); ?>">
        <?php else: ?>
            <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
        <?php endif; ?>
        <meta name="msapplication-tap-highlight" content="no" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php barnelli_favicon(); ?>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap-datetimepicker.min.css" />
        <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/promo.css" />
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            var siteUrl = "<?php bloginfo('siteurl'); ?>";
            var themeUrl = "<?php bloginfo('stylesheet_directory'); ?>";
            var ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';
        </script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        
        <div class="wrapper">
            <header></header>
            <nav>
                <a href="tel:01696956999">Hotline: 01696 956 999</a>
                <a href="www.fb.com/tuananh" target="_blank">www.fb.com/tuananh</a>
                <a href="http://www.tuananh.vn" target="_blank">www.tuananh.vn</a>
            </nav>
            <section id="main">
                <div class="info">
                    <h2>THÔNG TIN</h2>
                    <?php while (have_posts()) : the_post(); ?>
                    <?php echo $post->post_content; ?>
                    <?php endwhile; ?>
                </div>
                <div class="form">
                    <h2>THÔNG TIN KHÁCH HÀNG</h2>
                    <form action="" method="post" id="frmBook">
                        <input type="text" name="name" id="name" value="" placeholder="Họ và tên" />
                        <input type="text" name="phone" id="phone" value="" placeholder="Số điện thoại" />
                        <input type="text" name="email" id="email" value="" placeholder="Email" />
                        <div style="position: relative">
                            <input type="text" name="date" id="date" value="" placeholder="Ngày giờ" />
                        </div>
                        <div style="overflow: hidden;margin-top: 10px">
                            <a class="btn" href="https://www.facebook.com/sharer/sharer.php?u=<?php $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; echo $current_url; ?>" title="Chia sẻ cho bạn bè" target="_blank">Chia sẻ</a>
                            <input class="btn" type="submit" value="Đặt bàn" />
                        </div>
                    </form>
                </div>
                <div class="clear"></div>
            </section>
            <footer>
                <div class="fleft">
                    <span>NGUYEN TUAN ANH</span><br />
                    <span>Digital Marketing</span>
                </div>
                <div class="fright">
                    <span>Nguyen Tuan Anh</span><br />
                    <span style="font-size: 18px">Digital Marketing</span>
                </div>
                <div class="clear"></div>
            </footer>
            
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thông tin đặt bàn</h4>
                        </div>
                        <div class="modal-body">
                            
                        </div>
<!--                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>-->
                    </div>

                </div>
            </div>
        </div>
        
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-2.0.3.min.js"></script>
        <!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-migrate.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript">
            jQuery(function ($){
                $("#custom-style-css").remove();
                $('#date').datetimepicker({
                    locale: 'vi'
                });
//                $( "#date" ).datepicker({
//                    dateFormat: 'dd/mm/yy'
//                });
                $("#frmBook").submit(function (){
                    jQuery.ajax({
                        url: ajaxurl, type: "POST", dataType: "html", cache: false,
                        data: {
                            action: 'book_table',
                            name: $("#name").val(),
                            phone: $("#phone").val(),
                            email: $("#email").val(),
                            date: $("#date").val()
                        },
                        success: function(response, textStatus, XMLHttpRequest){
                            if(response && response.length > 0){
                                $(".modal-body").html(response);
                                $('#myModal').modal('show');
                                $("#name").val('');
                                $("#phone").val('');
                                $("#email").val('');
                                $("#date").val('');
                            }
                        },
                        error: function(MLHttpRequest, textStatus, errorThrown){},
                        complete:function(){}
                    });
                    return false;
                });
            });
        </script>
        <?php
        if (YSettings::g('theme_google_analytics')) {
            echo YSettings::g('theme_google_analytics');
        }
        ?>
        <?php wp_footer(); ?>
    </body>
</html>