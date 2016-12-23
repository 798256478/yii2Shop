<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>YII2商城 - 后台管理</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link href="/assets/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/assets/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/icons.css" />

    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="/assets/css/lib/font-awesome.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="/assets/css/compiled/signin.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

    <div class="row-fluid login-wrapper">
        <a class="brand" href="index.html"></a>

        <div class="span4 box">
            <div class="content-wrap">
                <h6>YII2商城 - 后台管理</h6>
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => '{error}{input}',
                    ],
                ]);?>
                    <?= $form->field($model, "username")->textInput(["class" => "span12", "placeholder" => "管理员账号"])?>
                    <?= $form->field($model, "password")->passwordInput(['class' => "span12", "placeholder" => "管理员密码"])?>
                    <a href="<?= Url::to(['admin/seekpassword'])?>" class="forgot">忘记密码?</a>
                    <?= $form->field($model, "rememberMe")->checkbox([
                        'id' => 'remember-me',
                        'template' => '<div class="remember">
                                           {input}
                                           <label for="remember-me">记住我</label>
                                       </div>',
                    ])?>
                    <?= Html::submitButton('登录', ['class' => 'btn-glow primary login']);?>
                <?php ActiveForm::end();?>
            </div>
        </div>
    </div>

	<!-- scripts -->
    <script src="/assets/js/jquery-latest.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/theme.js"></script>

    <!-- pre load bg imgs -->
    <script type="text/javascript">
        $(function () {
            // bg switcher
            var $btns = $(".bg-switch .bg");
            $btns.click(function (e) {
                e.preventDefault();
                $btns.removeClass("active");
                $(this).addClass("active");
                var bg = $(this).data("img");

                $("html").css("background-image", "url('/assets/img/bgs/" + bg + "')");
            });

        });
    </script>

</body>
</html>