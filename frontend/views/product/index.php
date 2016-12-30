       <section id="category-grid">
    <div class="container">
        
        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">

            <!-- ========================================= PRODUCT FILTER ========================================= -->
<div class="widget">
    <h1>商品筛选</h1>
    <div class="body bordered">
        
        <div class="price-filter">
            <h2>价格</h2>
            <hr>
            <div class="price-range-holder">

                <input type="text" class="price-slider" value="" >

                <span class="min-max">
                    Price: ￥89 - ￥2899
                </span>
                <span class="filter-button">
                    <a href="#">筛选</a>
                </span>
            </div>
        </div><!-- /.price-filter -->

    </div><!-- /.body -->
</div><!-- /.widget -->
<!-- ========================================= PRODUCT FILTER : END ========================================= -->
<div class="widget">
    <h1 class="border">热销商品</h1>
    <ul class="product-list">
        <?php foreach ($this->params['hot'] as $key => $value):?>
        <li>
            <div class="row">
                <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="<?= yii\helpers\Url::to(['/product/detail', 'id' => $value->id])?>" class="thumb-holder">
                        <img alt="" src="/assets/images/blank.gif" data-echo="<?= 'http://'.$value->cover.'?imageView2/2/w/75/h/75/interlace/0/q/100';?>" />
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="<?= yii\helpers\Url::to(['/product/detail', 'id' => $value->id])?>"><?= $value['name']?> </a>
                    <div class="price">
                        <div class="price-current">￥<?= $value['price']?></div>
                    </div>
                </div>  
            </div>
        </li>
        <?php endforeach;?>
    </ul>
</div><!-- /.widget -->
<!-- ========================================= FEATURED PRODUCTS ========================================= -->
<div class="widget">
    <h1 class="border">推荐商品</h1>
    <ul class="product-list">
        <?php foreach ($this->params['recommend'] as $key => $value):?>
        <li class="sidebar-product-list-item">
            <div class="row">
                <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="<?= yii\helpers\Url::to(['/product/detail', 'id' => $value->id])?>" class="thumb-holder">
                        <img alt="" src="/assets/images/blank.gif" data-echo="<?= 'http://'.$value->cover.'?imageView2/2/w/75/h/75/interlace/0/q/100';?>" />
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="<?= yii\helpers\Url::to(['/product/detail', 'id' => $value->id])?>"><?= $value['name']?></a>
                    <div class="price">
                        <div class="price-current">￥<?= $value['price']?></div>
                    </div>
                </div>  
            </div>
        </li><!-- /.sidebar-product-list-item -->
        <?php endforeach;?>
    </ul><!-- /.product-list -->
</div><!-- /.widget -->
<!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
        </div>
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->

        <div class="col-xs-12 col-sm-9 no-margin wide sidebar">

            <section id="recommended-products" class="carousel-holder hover small">

    <div class="title-nav">
        <h2 class="inverse">推荐商品</h2>
        <div class="nav-holder">
            <a href="#prev" data-target="#owl-recommended-products" class="slider-prev btn-prev fa fa-angle-left"></a>
            <a href="#next" data-target="#owl-recommended-products" class="slider-next btn-next fa fa-angle-right"></a>
        </div>
    </div><!-- /.title-nav -->

    <div id="owl-recommended-products" class="owl-carousel product-grid-holder">
        <?php foreach ($this->params['hot'] as $key => $value): ?>
        <div class="no-margin carousel-item product-item-holder hover size-medium">
            <div class="product-item">
                <div class="ribbon red"><span>sale</span></div> 
                <div class="image">
                    <img alt="" src="/assets/images/blank.gif" data-echo="<?= 'http://'.$value->cover.'?imageView2/2/w/250/h/250/interlace/0/q/100';?>" />
                </div>
                <div class="body">
                    <div class="title">
                        <a href="<?= yii\helpers\Url::to(['/product/detail', 'id' => $value->id])?>"><?= $value['name']?></a>
                    </div>
                </div>
                <div class="prices">
                    <div class="price-current text-right">￥<?= $value['price']?></div>
                </div>
                <div class="hover-area">
                    <div class="add-cart-button">
                        <a href="<?=yii\helpers\Url::to(['/cart/add', 'id' => $value->id])?>" class="le-button">加入购物车</a>
                    </div>
                </div>
            </div>
        </div><!-- /.carousel-item -->
        <?php endforeach ?>
    </div><!-- /#recommended-products-carousel .owl-carousel -->
</section><!-- /.carousel-holder -->            
            <section id="gaming">
    <div class="grid-list-products">
        <h2 class="section-title">所有商品</h2>
        <div class="control-bar">
            <div class="grid-list-buttons">
                <ul>
                    <li class="grid-list-button-item active"><a data-toggle="tab" href="#grid-view"><i class="fa fa-th-large"></i> 图文</a></li>
                    <li class="grid-list-button-item "><a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i> 列表</a></li>
                </ul>
            </div>
        </div><!-- /.control-bar -->
                                
        <div class="tab-content">
            <div id="grid-view" class="products-grid fade tab-pane in active">
                
                <div class="product-grid-holder">
                    <div class="row no-margin">
                        <?php foreach ($models as $key => $value): ?>
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="ribbon red"><span>sale</span></div> 
                                <div class="image">
                                    <img alt="" src="<?= 'http://'.$value->cover.'?imageView2/2/w/250/h/250/interlace/0/q/100';?>" data-echo="<?= 'http://'.$value->cover.'?imageView2/2/w/250/h/250/interlace/0/q/100';?>" style = "width: 80%;height: 200px;" />
                                </div>
                                <div class="body">
                                    <div class="title">
                                        <a href="<?= yii\helpers\Url::to(['/product/detail', 'id' => $value->id])?>"><?= $value->name?></a>
                                    </div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">￥<?= $value->price?></div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="<?=yii\helpers\Url::to(['/cart/add', 'id' => $value->id])?>" class="le-button">加入购物车</a>
                                    </div>
                                    
                                </div>
                            </div><!-- /.product-item -->
                        </div><!-- /.product-item-holder -->
                        <?php endforeach ?>
                    </div><!-- /.row -->
                </div><!-- /.product-grid-holder -->
                
                <div class="pagination-holder">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <ul class="pagination ">
                                <?= yii\widgets\LinkPager::widget([
                                    'pagination' => $pages,
                                ])?>
                            </ul>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.pagination-holder -->
            </div><!-- /.products-grid #grid-view -->

            <div id="list-view" class="products-grid fade tab-pane ">
                <div class="products-list">
                    <?php foreach ($models as $key => $value): ?>
                    <div class="product-item product-item-holder">
                        <div class="ribbon red"><span>sale</span></div> 
                        <div class="row">
                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                <div class="image">
                                    <img alt="" src="/assets/images/blank.gif" data-echo="<?= 'http://'.$value->cover.'?imageView2/2/w/250/h/250/interlace/0/q/100';?>" />
                                </div>
                            </div><!-- /.image-holder -->
                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                <div class="body">
                                    <div class="title">
                                        <a href="single-product.html"><?= $value->name?></a>
                                    </div>
                                    <div class="excerpt">
                                        <p><?= $value->intro?></p>
                                    </div>
                                </div>
                            </div><!-- /.body-holder -->
                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                <div class="right-clmn">
                                    <div class="price-prev"><?= $value->price?></div>
                                    <div class="availability"><label>存货:</label><span class="available">  现货</span></div>
                                    <a class="le-button" href="<?=yii\helpers\Url::to(['/cart/add', 'id' => $value->id])?>">加入购物车</a>
                                </div>
                            </div><!-- /.price-area -->
                        </div><!-- /.row -->
                    </div><!-- /.product-item -->
                    <?php endforeach ?>

                </div><!-- /.products-list -->

                <div class="pagination-holder">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <ul class="pagination ">
                                <?= yii\widgets\LinkPager::widget([
                                    'pagination' => $pages,
                                ])?>
                            </ul>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.pagination-holder -->

            </div><!-- /.products-grid #list-view -->

        </div><!-- /.tab-content -->
    </div><!-- /.grid-list-products -->

</section><!-- /#gaming -->            
        </div><!-- /.col -->
        <!-- ========================================= CONTENT : END ========================================= -->    
    </div><!-- /.container -->
</section><!-- /#category-grid -->    