<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

if (Yii::$app->getSession()->hasFlash('success')) {
    $successTitle = addslashes( yii::t('app', 'Success') );
    $success=Yii::$app->getSession()->getFlash('success');
    $success=is_array($success)?json_encode($success):$success;
    $info = addslashes($success);
    $str = <<<EOF
        toastr.options=toastrOption.success;
        toastr.success("{$successTitle}", "{$info}");
EOF;
    $this->registerJs($str);
}
if (Yii::$app->getSession()->hasFlash('error')) {
    $errorTitle = addslashes( yii::t('app', 'Error') );
    $info = addslashes( Yii::$app->getSession()->getFlash('error') );
    $str = <<<EOF
       toastr.options = toastrOption.error;
       toastr.error("{$errorTitle}", "{$info}");
EOF;
    $this->registerJs($str);
}
if (Yii::$app->getSession()->hasFlash('warning')) {
    $errorTitle = addslashes( yii::t('app', 'Warning') );
    $info = addslashes( Yii::$app->getSession()->getFlash('warning') );
    $str = <<<EOF
       toastr.options = toastrOption.warning;
       toastr.warning("{$errorTitle}", "{$info}");
EOF;
    $this->registerJs($str);
}
if (Yii::$app->getSession()->hasFlash('info')) {
    $infoTitle = addslashes( yii::t('app', 'Info') );
    $info = addslashes( Yii::$app->getSession()->getFlash('info') );
    $str = <<<EOF
       toastr.options = toastrOption.info;
       toastr.info("{$infoTitle}", "{$info}");
EOF;
    $this->registerJs($str);
}
?>