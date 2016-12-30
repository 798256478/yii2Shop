
	<!-- main container -->
    <div class="content">
      
        <div class="container-fluid">
            <div id="pad-wrapper" class="users-list">
                <div class="row-fluid header">
                    <h3>管理员</h3>
                    <div class="span10 pull-right">
                        <input type="text" class="span5 search" placeholder="管理员名称" />
                        
                        <!-- custom popup filter -->
                        <!-- styles are located in css/elements.css -->
                        <!-- script that enables this dropdown is located in js/theme.js -->
                        <div class="ui-dropdown">
                            <div class="head" data-toggle="tooltip" title="Click me!">
                                过滤
                                <i class="arrow-down"></i>
                            </div>  
                            <div class="dialog">
                                <div class="pointer">
                                    <div class="arrow"></div>
                                    <div class="arrow_border"></div>
                                </div>
                                <div class="body">
                                    <p class="title">
                                        过滤条件
                                    </p>
                                    <div class="form">
                                        <select>
                                            <option />姓名
                                            <option />邮箱
                                            <option />注册时间
                                            <option />最后登录时间
                                        </select>
                                        <select>
                                            <option />等于
                                            <option />不等于
                                            <option />大于
                                            <option />开始于
                                            <option />包括
                                        </select>
                                        <input type="text" />
                                        <a class="btn-flat small">添加过滤</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="<?php echo yii\helpers\Url::to(['manager/addadmin']);?>" class="btn-flat success pull-right">
                            <span>&#43;</span>
                            添加新管理员
                        </a>
                    </div>
                </div>

                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span4 sortable">
                                    ID
                                </th>
                                <th class="span4 sortable">
                                    账号
                                </th>
                                <th class="span4 sortable">
                                    上次登录时间
                                </th>
                                <th class="span4 sortable">
                                    上次登录IP
                                </th>
                                <th class="span3 sortable">
                                    <span class="line"></span>注册时间
                                </th>
                                <th class="span3 sortable align-right">
                                    <span class="line"></span>邮箱
                                </th>
                                <th class="span3 sortable align-right">
                                    <span class="line"></span>操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?php foreach($models as $model):?>
                        <tr class="first">
                            <td>
                                <?php echo $model->id;?>
                            </td>
                            <td>
                                <?php echo $model->username;?>
                            </td>
                            <td>
                                <?php echo $model->logintime? $model->logintime:"从未登录";?>
                            </td>
                            <td>
                                <?php echo $model->loginip? long2ip($model->loginip):"从未登录";?>
                            </td>
                            <td>
                                <?php echo $model->create_at;?>
                            </td>
                            <td class="align-right">
                                <?php echo $model->email;?>
                            </td>
                            <td class="align-right">
                            <?php if ($model->id != 1): ?>
                                <a href="<?php echo yii\helpers\Url::to(['/manager/del', 'id' => $model->id])?>">删除</a>
                            <?php else:?>
                                <label>不可操作</label>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination pull-right">
                <?php
                    echo \yii\widgets\LinkPager::widget(['pagination' => $pages,'nextPageLabel' => "&#8250;", 'prevPageLabel' => '&#8249;']);
                ?>
                </div>
                <!-- end users table -->
            </div>
        </div>
    </div>
    <!-- end main container -->
