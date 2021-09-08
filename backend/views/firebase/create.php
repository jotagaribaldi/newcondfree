<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Condominos */

$this->title = 'Nova Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas conveniadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
echo ('create');

?>
<div class="condominos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
