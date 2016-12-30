
       <div id="top-banner-and-menu">
    <div class="container">
        
        <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
            <!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown">
    <div class="head"><i class="fa fa-list"></i> 所有分类 </div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            <?php foreach ($this->params['category'] as $key => $value):?>
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $value['title']?></a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                        <div class="row">
                            <div class="col-xs-12 col-lg-12">
                                <ul>
                                    <?php foreach ($value['children'] as $key => $value): ?>
                                        
                                    <li><a href="#"><?= $value['title']?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <!-- ================================== MEGAMENU VERTICAL ================================== -->                        
                    </li>
                </ul>
            </li><!-- /.menu-item -->
        <?php endforeach;?>
            <!--<li><a href="http://themeforest.net/item/media-center-electronic-ecommerce-html-template/8178892?ref=shaikrilwan">Buy this Theme</a></li>-->
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->     </div><!-- /.sidemenu-holder -->

        <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
            
<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        <?php foreach ($this->params['recommend'] as $key => $value): ?>
        <div class="item" style="background-image: url(<?= 'http://'.$value['cover']."?imageView2/2/w/1920/h/953/interlace/0/q/100" ?>);">
            <div class="container-fluid">
                <div class="caption vertical-center text-left">
                    <div class="excerpt fadeInDown-2">
                        <?= $value['intro']?>
                    </div>
                    <div class="button-holder fadeInDown-3">
                        <a href="<?= yii\helpers\Url::to(['product/detail', 'id' => $value->id])?>" class="big le-button ">去购买</a>
                    </div>
                </div><!-- /.caption -->
            </div><!-- /.container-fluid -->
        </div><!-- /.item -->
        <?php endforeach ?>
    </div><!-- /.owl-carousel -->
</div>
            
<!-- ========================================= SECTION – HERO : END ========================================= -->           
        </div><!-- /.homebanner-holder -->

    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">推荐商品</a></li>
                <li><a href="#top-sales" data-toggle="tab">最佳热卖</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                        <?php foreach ($this->params['recommend'] as $key => $value): ?>
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="ribbon red"><span>sale</span></div> 
                                <div class="image">
                                    <img alt="" src="/assets/images/blank.gif" data-echo="<?= 'http://'.$value['cover']."?imageView2/2/w/250/h/250/interlace/0/q/100" ?>" />
                                </div>
                                <div class="body">
                                    <div class="title">
                                        <a href="<?= yii\helpers\Url::to(['product/detail', 'id' => $value->id])?>"><?= $value['name']?></a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">￥<?= $value['price']?></div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="single-product.html" class="le-button">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="tab-pane" id="top-sales">
                    <div class="product-grid-holder">
                        <?php foreach ($this->params['hot'] as $key => $value): ?>
                        <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="ribbon red"><span>sale</span></div> 
                                <div class="ribbon green"><span>bestseller</span></div> 
                                <div class="image">
                                    <img alt="" src="/assets/images/blank.gif" data-echo="<?= 'http://'.$value['cover']."?imageView2/2/w/250/h/250/interlace/0/q/100" ?>" />
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="<?= yii\helpers\Url::to(['product/detail', 'id' => $value->id])?>"><?= $value['name']?></a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">￥<?= $value['price']?></div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="single-product.html" class="le-button">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========================================= TOP BRANDS ========================================= -->
<section id="top-brands" class="wow fadeInUp">
    <div class="container">
        <div class="carousel-holder" >
            
            <div class="title-nav">
                <h1>热门品牌</h1>
                <div class="nav-holder">
                    <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                    <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                </div>
            </div><!-- /.title-nav -->
            
            <div id="owl-brands" class="owl-carousel brands-carousel">
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-01.jpg" />
                    </a>
                </div><!-- /.carousel-item -->
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-02.jpg" />
                    </a>
                </div><!-- /.carousel-item -->
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-03.jpg" />
                    </a>
                </div><!-- /.carousel-item -->
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-04.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-01.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-02.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-03.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-04.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

            </div><!-- /.brands-caresoul -->

        </div><!-- /.carousel-holder -->
    </div><!-- /.container -->
</section><!-- /#top-brands -->
<!-- ========================================= TOP BRANDS : END ========================================= -->       
