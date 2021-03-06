<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>
    <link rel="stylesheet" href="/assets/css/compiled/new-user.css" type="text/css" media="screen" />
    <!-- main container -->
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>添加商品</h3>
                </div>
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                                <?php
                                if (Yii::$app->session->hasFlash('message')) {
                                    echo Yii::$app->session->getFlash('message');
                                }
                                $form = ActiveForm::begin([
                                    'fieldConfig' => [
                                        'template' => '<div class="span12 field-box">{label}{input}</div>{error}',
                                    ],
                                    'options' => [
                                        'class' => 'new_user_form inline-input',
                                        'enctype' => 'multipart/form-data'
                                    ],
                                ]);
                                echo $form->field($model, 'cate_id')->dropDownList($opts, ['id' => 'cates']);
                                echo $form->field($model, 'name')->textInput(['class' => 'span9']);
                                echo $form->field($model, 'intro')->textarea(['id' => "wysi", 'class' => "span9 wysihtml5"]);
                                echo $form->field($model, 'price')->textInput(['class' => 'span9']);
                                echo $form->field($model, 'ishot')->radioList([0 => '不热卖', 1 => '热卖'], ['class' => 'span8']);
                                echo $form->field($model, 'num')->textInput(['class' => 'span9']);
                                echo $form->field($model, 'ison')->radioList(['下架', '上架'], ['class' => 'span8']);
                                echo $form->field($model, 'isrecommend')->radioList(['不推荐', '推荐'], ['class' => 'span8']);
                                echo $form->field($model, 'cover')->fileInput(['class' => 'span9']);
                                if (!empty($model->cover)):
                                ?>
                                    <img src="<?php echo 'http://'.$model->cover.'?imageView2/2/w/200/h/200/interlace/0/q/100';?>">
                                    <hr>
                                <?php
                                    endif;
                                    echo $form->field($model, 'image[]')->fileInput(['class' => 'span9', 'multiple' => true,]);
                                ?>
                                <?php
                                    foreach((array)json_decode($model->image) as $k=>$pic) {
                                ?>
                                    <img src="<?php echo 'http://'.$pic.'?imageView2/2/w/100/h/100/interlace/0/q/100'?>">
                                    <a href="<?php echo yii\helpers\Url::to(['product/removepic', 'key' => $k, 'id' => $model->id]) ?>">删除</a>
                                <?php
                                }
                                ?>
                                <hr>
                                <input type='button' id="addpic" value='增加一个'>
                                <div class="span11 field-box actions">
                                    <?php echo Html::submitButton('提交', ['class' => 'btn-glow primary']); ?>
                                    <span>OR</span>
                                    <?php echo Html::resetButton('取消', ['class' => 'reset']); ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                    <!-- side right column -->
                    <div class="span3 form-sidebar pull-right">
                        <div class="alert alert-info hidden-tablet">
                            <i class="icon-lightbulb pull-left"></i>
                            请在左侧表单当中填入要添加的商品信息,包括商品名称,描述,图片等
                        </div>                        
                        <h6>商城用户说明</h6>
                        <p>可以在前台进行购物</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->
