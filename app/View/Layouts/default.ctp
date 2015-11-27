<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Query</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
    echo $this->Html->meta(
        'favicon.ico',
        '/favicon.ico',
        array('type' => 'icon')
        );
        ?>

        <?= $this->Html->css('bootstrap') ?>
        <?= $this->Html->css('bootstrap-theme') ?>
        <?= $this->Html->css('font-awesome') ?>
        <?= $this->Html->css('custom') ?>

    </head>
    <body>
        <div id="main-body" class="container">

            <?= $this->element('navbar'); ?>


            <!-- Flash -->
            <div id="flash">
                <?php echo $this->Flash->render(); ?>
            </div>




            <br/>

            <div class="container-fluid ">
                <?php echo $this->Html->image('logo_dark_background.png', array('alt' => 'Logo', 'class' => 'logo', 'url' => array('controller' => 'queries', 'action' => 'index'))); ?>
            </div>
            <br>

            <div class="container-fluid">
                <div class="col-sm-12">
                    <?php if(!isset($_COOKIE["well"])){
                        ?>
                        <div class="well well-lg">
                            <span class="pull-right close-button" onclick="closeAndRemember()">X</span>
                            <blockquote>
                                <p><?= __("Query es una comunidad de preguntas y respuestas sobre el mundo de la tecnología de la información. Regístrate para unirte a la comunidad y resolver de una vez por todas tus dudas!"); ?></p>
                                <small><?= __("El equipo de "); ?><cite class="quizma-font-bold" title="Query"><?= __("Query"); ?></cite></small>
                            </blockquote>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <br>

            <!-- PREGUNTAS view.ctp -->
            <?= $this->fetch('content'); ?>

            <!-- Footer -->
            <?= $this->element('footer'); ?>


        </div>


        <!-- Modales -->


        <div id="pregunta" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <?php
                if(!$this->Session->read("User.id")){
                        //Cant publish query    
                }else{
                    ?>
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png"></img><?= __("Publica tu pregunta"); ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="col-sm-12">
                                    <h3><?= __("Introduce tu Query"); ?></h3><br>
                                    <?= $this->Form->create('Query', array('action' => '/add')); ?>
                                    <div class="form-group">
                                        <?= $this->Form->input("title", array("class" => "form-control", "placeholder" => __("Título..."), "id" => "focusedInput"));?>
                                        <?= $this->Form->input("user_id", array("type" => "hidden", "value" => $this->Session->read("User.id")));?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->textarea("content", array("class" => "form-control", "placeholder" => __("Tu Query..."), "id" => "focusedInput"));?>
                                    </div>
                                    <div class="form-group pull-right">
                                        <?= $this->Form->submit('Publicar', array('class' => 'btn btn-info')); ?>
                                    </div>
                                    <?= $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        

        <?= $this->Html->script('jquery-1.11.3') ?>
        <?= $this->Html->script('bootstrap') ?>
        <?= $this->Html->script('validator.min') ?>
        <?= $this->Html->script('boobles') ?>
        <?= $this->Html->script('main') ?>
        <?= $this->element('defaultScripts'); ?>
    </body>
    </html>

