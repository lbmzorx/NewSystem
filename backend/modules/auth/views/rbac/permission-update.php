<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-09-12 12:32
 */
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $model backend\models\form\Rbac
 */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Permissions'), 'url' => Url::to(['permissions'])],
    ['label' => yii::t('app', 'Update') . yii::t('app', 'Permissions')],
];

?>
<div class="update-permission">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $this->render('_permission-form', [
        'model' => $model,
    ]) ?>
</div>
