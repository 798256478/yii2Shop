<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
    <link rel="stylesheet" href="assets/admin/css/compiled/new-user.css" type="text/css" media="screen" />
    <!-- main container -->
    <div class="content">
        
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>修改管理员密码</h3>
                </div>

                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                        <div>
                            <?= Yii::$app->session->hasFlash('changepassword')?Yii::$app->session->getFlash('changepassword'):''?>
                        </div>
                        <?php $form = ActiveForm::begin([
                            "options" => ['class' => 'new-user_form inline-input'],
                            "fieldConfig" => ['template' => '<div class="span12 field-box" style="margin-left: 30px">
                                                                {label}
                                                                {input}
                                                                {error} 
                                                             </div> 
                                                             '],
                            ])?>
                            
                            <?= $form->field($model, 'username')->textInput(['class' => 'span9', 'disabled' => true])?>
                            <?= $form->field($model, 'password')->passwordInput(['class' => 'span9'])?>
                            <?= $form->field($model, 'confirmpassword')->passwordInput(['class' => 'span9'])?>  
                            <div class="span11 field-box actions">
                                <?= Html::submitButton('修改', ['class' => 'btn-glow primary'])?>
                                <span>或者</span>
                                <?= Html::resetButton('取消', ['class' => 'reset'])?>
                            </div>
                            <?php ActiveForm::end()?>
                        </div>
                    </div>

                    <!-- side right column -->
                    <div class="span3 form-sidebar pull-right">
                        
                        <div class="alert alert-info hidden-tablet">
                            <i class="icon-lightbulb pull-left"></i>
                            请在左侧填写管理员相关信息，包括管理员账号，电子邮箱，以及密码
                        </div>                        
                        <h6>重要提示：</h6>
                        <p>管理员可以管理后台功能模块</p>
                        <p>请谨慎添加</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->