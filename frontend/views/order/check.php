       <!-- ========================================= CONTENT ========================================= -->
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<section id="checkout-page">
    <div class="container">
        <div class="col-xs-12 no-margin">
            <section id="shipping-address" style="margin-bottom:100px;margin-top:-10px">
                <h2 class="border h1">收货地址</h2>
                    <a href="#" id="createlink">新建联系人</a>
                <form>
                    <?php foreach ($addresslist as $key => $value): ?>
                    <div class="row field-row" style="margin-top:10px">
                        <div class="col-xs-12">
                            <input  class="le-radio big" type="radio" name="address" />
                            <a class="simple-link bold" href="#"><?= $value->address?></a>
                        </div>
                    </div><!-- /.field-row -->
                    <?php endforeach ?>
                </form>
            </section><!-- /#shipping-address -->
            
            <div class="billing-address" style="display:none;">
                <h2 class="border h1">新建联系人</h2>
                <? $form = ActiveForm::begin([
                    'action' => yii\helpers\Url::to(['order/createaddress']),
                    'fieldConfig' => [
                        'template'=>"<div class='col-xs-12 col-sm-12'>
                                     {label}
                                     {input}
                                     </div>
                                     {error}"],
                    ])?>
                    <div class="row field-row">
                        <?= $form->field($address, 'name')->textInput(['class' => 'le-input']);?>
                    </div><!-- /.field-row -->
                    
                    <div class="row field-row">
                        <?= $form->field($address, 'telephone')->textInput(['class' => 'le-input']);?>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <?= $form->field($address, 'address')->textInput(['class' => 'le-input']);?>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <?= $form->field($address, 'postcode')->textInput(['class' => 'le-input']);?>
                    </div><!-- /.field-row -->

                    <!--<div class="row field-row">
                        <div id="create-account" class="col-xs-12">
                            <input  class="le-checkbox big" type="checkbox"  />
                            <a class="simple-link bold" href="#">新建联系人？</a>
                        </div>
                    </div>--><!-- /.field-row -->
                    <div class="place-order-button">
                        <?= Html::submitButton('新建', ['class' => "le-button small"])?>
                    </div><!-- /.place-order-button -->
                <? ActiveForm::end()?>
            </div><!-- /.billing-address -->


            <section id="your-order">
                <h2 class="border h1">您的订单详情</h2>
                <form>
                    <?php foreach ($this->params['cart'] as $key => $value): ?>                    
                    <div class="row no-margin order-item">
                        <div class="col-xs-12 col-sm-1 no-margin">
                            <a href="#" class="qty">X<?= $value['productnum']?></a>
                        </div>

                        <div class="col-xs-12 col-sm-9 ">
                            <div class="title"><a href="#"><?= $value['products']['name']?></a></div>
                        </div>

                        <div class="col-xs-12 col-sm-2 no-margin">
                            <div class="price">￥<?= $value['productnum'] * $value['products']['price']?></div>
                        </div>
                    </div><!-- /.order-item -->
                    <?php endforeach ?>
                </form>
            </section><!-- /#your-order -->

            <div id="total-area" class="row no-margin">
                <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                    <div id="subtotal-holder">
                        <ul class="tabled-data inverse-bold no-border">
                            <li>
                                <label>商品总价</label>
                                <div style="width:100%;text-align:right" class="value ">￥<?= $this->params['totalprice']?></div>
                            </li>
                            <li>
                                <label>选择快递</label>
                                <div style="width:100%;text-align:right" class="value">
                                    <div class="radio-group">
                                        <?php foreach ($express as $key => $value): ?>
                                        <input class="le-radio" type="radio" name="group1" value="free"> <div class="radio-label bold"><?= $value['name']?><span class="bold"> ￥<?= $value['price']?></span></div><br>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </li>
                        </ul><!-- /.tabled-data -->

                        <ul id="total-field" class="tabled-data inverse-bold ">
                            <li>
                                <label>订单总额</label>
                                <div class="value" style="width:100%;text-align:right">$8434.00</div>
                            </li>
                        </ul><!-- /.tabled-data -->

                    </div><!-- /#subtotal-holder -->
                </div><!-- /.col -->
            </div><!-- /#total-area -->

            <div id="payment-method-options">
                <form>
                    <div class="payment-method-option">
                        <input class="le-radio" type="radio" name="group2" value="cheque">
                        <div class="radio-label bold ">支付宝支付</div>
                    </div><!-- /.payment-method-option -->
                    
                    <div class="payment-method-option">
                        <input class="le-radio" type="radio" name="group2" value="paypal">
                        <div class="radio-label bold ">网银支付</div>
                    </div><!-- /.payment-method-option -->
                </form>
            </div><!-- /#payment-method-options -->
            
            <div class="place-order-button">
                <button class="le-button big">确认订单</button>
            </div><!-- /.place-order-button -->

        </div><!-- /.col -->
    </div><!-- /.container -->    
</section><!-- /#checkout-page -->
<!-- ========================================= CONTENT : END ========================================= -->     