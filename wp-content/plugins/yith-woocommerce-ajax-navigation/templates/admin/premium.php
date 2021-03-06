



<style>
    .section{
        margin-left: -20px;
        margin-right: -20px;
        font-family: "Raleway",san-serif;
    }
    .section h1{
        text-align: center;
        text-transform: uppercase;
        color: #808a97;
        font-size: 35px;
        font-weight: 700;
        line-height: normal;
        display: inline-block;
        width: 100%;
        margin: 50px 0 0;
    }
    .section ul{
        list-style-type: disc;
        padding-left: 15px;
    }
    .section:nth-child(even){
        background-color: #fff;
    }
    .section:nth-child(odd){
        background-color: #f1f1f1;
    }
    .section .section-title img{
        display: table-cell;
        vertical-align: middle;
        width: auto;
        margin-right: 15px;
    }
    .section h2,
    .section h3 {
        display: inline-block;
        vertical-align: middle;
        padding: 0;
        font-size: 24px;
        font-weight: 700;
        color: #808a97;
        text-transform: uppercase;
    }

    .section .section-title h2{
        display: table-cell;
        vertical-align: middle;
        line-height: 25px;
    }

    .section-title{
        display: table;
    }

    .section h3 {
        font-size: 14px;
        line-height: 28px;
        margin-bottom: 0;
        display: block;
    }

    .section p{
        font-size: 13px;
        margin: 25px 0;
    }
    .section ul li{
        margin-bottom: 4px;
    }
    .landing-container{
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
        padding: 50px 0 30px;
    }
    .landing-container:after{
        display: block;
        clear: both;
        content: '';
    }
    .landing-container .col-1,
    .landing-container .col-2{
        float: left;
        box-sizing: border-box;
        padding: 0 15px;
    }
    .landing-container .col-1 img{
        width: 100%;
    }
    .landing-container .col-1{
        width: 55%;
    }
    .landing-container .col-2{
        width: 45%;
    }
    .premium-cta{
        background-color: #808a97;
        color: #fff;
        border-radius: 6px;
        padding: 20px 15px;
    }
    .premium-cta:after{
        content: '';
        display: block;
        clear: both;
    }
    .premium-cta p{
        margin: 7px 0;
        font-size: 14px;
        font-weight: 500;
        display: inline-block;
        width: 60%;
    }
    .premium-cta a.button{
        border-radius: 6px;
        height: 60px;
        float: right;
        background: url(<?php echo YITH_WCAN_URL?>assets/images/upgrade.png) #ff643f no-repeat 13px 13px;
        border-color: #ff643f;
        box-shadow: none;
        outline: none;
        color: #fff;
        position: relative;
        padding: 9px 50px 9px 70px;
    }
    .premium-cta a.button:hover,
    .premium-cta a.button:active,
    .premium-cta a.button:focus{
        color: #fff;
        background: url(<?php echo YITH_WCAN_URL?>assets/images/upgrade.png) #971d00 no-repeat 13px 13px;
        border-color: #971d00;
        box-shadow: none;
        outline: none;
    }
    .premium-cta a.button:focus{
        top: 1px;
    }
    .premium-cta a.button span{
        line-height: 13px;
    }
    .premium-cta a.button .highlight{
        display: block;
        font-size: 20px;
        font-weight: 700;
        line-height: 20px;
    }
    .premium-cta .highlight{
        text-transform: uppercase;
        background: none;
        font-weight: 800;
        color: #fff;
    }

    @media (max-width: 768px) {
        .section{margin: 0}
        .premium-cta p{
            width: 100%;
        }
        .premium-cta{
            text-align: center;
        }
        .premium-cta a.button{
            float: none;
        }
    }

    @media (max-width: 480px){
        .wrap{
            margin-right: 0;
        }
        .section{
            margin: 0;
        }
        .landing-container .col-1,
        .landing-container .col-2{
            width: 100%;
            padding: 0 15px;
        }
        .section-odd .col-1 {
            float: left;
            margin-right: -100%;
        }
        .section-odd .col-2 {
            float: right;
            margin-top: 65%;
        }
    }

    @media (max-width: 320px){
        .premium-cta a.button{
            padding: 9px 20px 9px 70px;
        }

        .section .section-title img{
            display: none;
        }
    }
</style>
<div class="landing">
    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce Ajax Product Filter%2$s to benefit from all features!','yith_wc_ajxnav'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo $this->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','yith_wc_ajxnav');?></span>
                    <span><?php _e('to the premium version','yith_wc_ajxnav');?></span>
                </a>
            </div>
        </div>
    </div>
    <div class="section section-even clear" style="background: url(<?php echo YITH_WCAN_URL ?>assets/images/01-bg.png) no-repeat #fff; background-position: 85% 75%">
        <h1><?php _e('Premium Features','yith_wc_ajxnav');?></h1>
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_WCAN_URL ?>assets/images/01.png" alt="layouts" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCAN_URL ?>assets/images/01-icon.png" alt="icon 01"/>
                    <h2><?php _e('Two more layouts','yith_wc_ajxnav');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('The YITH WooCommerce Ajax product Filter widget get richer with 2 new layouts to filter the products of your shop.
                    %1$sBicolor%2$s: the perfect choice for those attributes related to two different colors at the same time (white/black), for a simple visual impact for the final user. Pick the %1$sTag%2$s typology, on the contrary, if you want to filter your products by product tag.
                    And if you are using also the %1$sYITH WooCommerce Brand Add-On%2$s plugin, you will be able to offer the freedom to filter your shop products by brands thanks to the ajax technology.
                ', 'yith_wc_ajxnav'), '<b>', '</b>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="section section-odd clear" style="background: url(<?php echo YITH_WCAN_URL ?>assets/images/02-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCAN_URL ?>assets/images/02-icon.png" alt="icon 02" />
                    <h2><?php _e('Price range','yith_wc_ajxnav');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('One of the most requested filter for e-commerce sites is the one that let you select products by their prices.
                    Thanks to YITH WooCommerce Ajax List Price Filter, %1$syou can set unlimited price ranges:%2$s your users will be able to filter products selecting on the ranges you have set.', 'yith_wc_ajxnav'), '<b>', '</b>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_WCAN_URL ?>assets/images/02.png" alt="Price range" />
            </div>
        </div>
    </div>
    <div class="section section-even clear" style="background: url(<?php echo YITH_WCAN_URL ?>assets/images/03-bg.png) no-repeat #fff; background-position: 85% 100%">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_WCAN_URL ?>assets/images/03.png" alt="Stock products" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCAN_URL ?>assets/images/03-icon.png" alt="icon 03" />
                    <h2><?php _e( 'Ajax Stock/On Sale Filters','yith_wc_ajxnav');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('A new widget for the premium version of the plugin.
                    Whoever will surf the pages of your shop will be able to display only the products on sale and/or the available ones.%3$s
                    %1$sAn additional feature for an e-commerce site that is worthy!%2$s', 'yith_wc_ajxnav'), '<b>', '</b>','<br>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="section section-odd clear" style="background: url(<?php echo YITH_WCAN_URL ?>assets/images/04-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCAN_URL ?>assets/images/04-icon.png" alt="icon 04" />
                    <h2><?php _e('Product sorting','yith_wc_ajxnav');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('With the new %1$sYITH WooCommerce Ajax Sort By%2$s widget, you can give your users the freedom to sort products with the ajax technology,
                    without the need to reload the page. Products can be sorted by rate, sales, price or publication date.', 'yith_wc_ajxnav'), '<b>', '</b>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_WCAN_URL ?>assets/images/04.png" alt="product sorting" />
            </div>
        </div>
    </div>
    <div class="section section-even clear" style="background: url(<?php echo YITH_WCAN_URL ?>assets/images/05-bg.png) no-repeat #fff; background-position: 85% 100%">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_WCAN_URL ?>assets/images/05.png" alt="loader" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCAN_URL?>assets/images/05-icon.png" alt="icon 05" />
                    <h2><?php _e('Customized loader','yith_wc_ajxnav');?></h2>
                </div>
                <p>
                    <?php _e('From the plugin option panel, you can choose to upload a new icon for your loader: in this way, it will better meet your needs.','') ?>
                </p>
            </div>
        </div>
    </div>
    <div class="section section-odd clear" style="background: url(<?php echo YITH_WCAN_URL ?>assets/images/06-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCAN_URL ?>assets/images/06-icon.png" alt="icon 06" />
                    <h2><?php _e('WooCommerce Price Filter','yith_wc_ajxnav');?></h2>
                </div>
                <p>
                    <?php echo _e('With the premium version of the plugin, you will also be able to customize WooCommerce Price Filter widget, changing the settings you can find in the plugin option panel.', 'yith_wc_ajxnav');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_WCAN_URL ?>assets/images/06.png" alt="woocommerce price filter" />
            </div>
        </div>
    </div>
    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce Ajax Product Filter%2$s to benefit from all features!','yith_wc_ajxnav'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo $this->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','yith_wc_ajxnav');?></span>
                    <span><?php _e('to the premium version','yith_wc_ajxnav');?></span>
                </a>
            </div>
        </div>
    </div>
</div>