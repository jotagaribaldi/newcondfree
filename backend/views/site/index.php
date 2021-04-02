<?php

/* @var $this yii\web\View */

$this->title = 'Condomínio Livre';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Painel de Controle</h1>

       <!-- <p class="lead">You have successfully created your Yii-powered application.</p> -->

     <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Parceiros</h2>

                <p>Cadastro de Parceiros do sistema Suprema Cashback.</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=parceiros/create">Novo Parceiro &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Condomínios</h2>

                <p>Cadastro de Condomínios participantes do programa Suprema Cashback.</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=condominios/create">Novo Condomínio &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Síndicos</h2>

                <p>Cadastro de Síndicos dos Condomínios participantes.</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=sindicos/create">Novo Síndico &raquo;</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <h2>Usuários</h2>

                <p>Cadastro Geral de Usuários do Sistema Suprema Cashback.</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=admin">Lista de Usuários &raquo;</a></p>
            </div>

            <div class="col-lg-4">
                <h2>Empresas parceiras</h2>

                <p>Cadastro de Empresas parceiras conveniadas ao sistema de Cashback.</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=empresasconv/create">Nova Empresa &raquo;</a></p>
            </div>


            <div class="col-lg-4">
                <h2>Condôminos</h2>

                <p>Cadastro de Condôminos participantes do programa Suprema Cashback</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=condominos">Novo Condômino &raquo;</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <h2>Quadras / Blocos</h2>

                <p>Cadastro de Quadras ou Blocos de Condomínios.</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=quadrablocos/create">Nova Quadra &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Imóveis</h2>

                <p>Cadastro de Imóveis de cada condomínio e vínculo com os condôminos.</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=unidadesimov">Novo Imóvel / Morador &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Notas Lidas</h2>

                <p>Listagem e Lançamento Manual de Notas Lidas no sistema</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=comprasrealiz/index">Listar &raquo;</a></p>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4">
                <h2>Leituras Firebase</h2>

                <p>Leituras de notas fiscais vindas do Firebase.</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=firebase/index">Listar &raquo;</a></p>
            </div>
           <div class="col-lg-4">
                <h2>Pagamentos das Empresas Parceiras</h2>

                <p>Controle de pagamentos das empresas parceiras dos bônus por compras realizadas.</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=fatura-empresas">Faturas Geradas  &raquo;</a></p>
            </div>
         <!--   <div class="col-lg-4">
                <h2>Notas Lidas</h2>

                <p>Listagem e Lançamento Manual de Notas Lidas no sistema</p>

                <p><a class="btn btn-default" href="/app/newcondfree/backend/web/index.php?r=comprasrealiz/index">Listar &raquo;</a></p>
            </div> -->
        </div>
    </div>
</div>
