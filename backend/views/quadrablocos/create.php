<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Quadrablocos */

$this->title = 'Nova Quadra / Bloco';
$this->params['breadcrumbs'][] = ['label' => 'Quadras / Blocos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quadrablocos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
