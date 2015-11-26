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

            <div class="container-fluid intro-text">
                <div class="col-sm-12">
                    <?php if(!isset($_COOKIE["well"])){
                        ?>
                        <div class="well well-lg">
                            <span class="pull-right close-button" onclick="closeAndRemember()">X</span>
                            <blockquote>
                                <p>Query es una comunidad de preguntas y respuestas sobre el mundo de la tecnología de la información.
                                    Regístrate para unirte a la comunidad y resolver de una vez por todas tus dudas!</p>
                                    <small>El equipo de <cite class="quizma-font-bold" title="Query">Query</cite></small>
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
                        ?>

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png"></img>No
                                    estás identificado</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="col-sm-6">
                                            <h3>Identifícate...</h3><br>

                                            <div class="form-group">
                                                <input class="form-control" id="focusedInput" type="text" placeholder="Usuario">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="focusedInput" type="password" placeholder="Contraseña">
                                            </div>
                                            <div class="form-group pull-right">
                                                <button type="button" class="btn btn-success">Login</button>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <h3>O regístrate</h3><br>

                                            <div class="form-group">
                                                <input class="form-control" id="focusedInput" type="text" placeholder="Usuario">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="focusedInput" type="text" placeholder="Correo">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="focusedInput" type="password" placeholder="Contraseña">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="focusedInput" type="password"
                                                placeholder="Repite tu contraseña">
                                            </div>
                                            <div class="form-group pull-right">
                                                <button type="button" class="btn btn-info">Regístrate</button>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <p class="eula">Registrándote en Query das a entender que aceptas nuestros términos de licencia de
                                        usuario. Puedes consultarlos <a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">aquí</a>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }else{
                            ?>
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png"></img>Publica tu pregunta</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="col-sm-12">
                                            <h3>Introduce tu Query</h3><br>
                                            <?= $this->Form->create('Query', array('action' => '/add')); ?>
                                            <div class="form-group">
                                                <?= $this->Form->input("title", array("class" => "form-control", "placeholder" => "Título...", "id" => "focusedInput"));?>
                                                <?= $this->Form->input("user_id", array("type" => "hidden", "value" => $this->Session->read("User.id")));?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->textarea("content", array("class" => "form-control", "placeholder" => "Tu Query...", "id" => "focusedInput"));?>
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

                <div id="responderQuery" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><img class="modal-header-icon" src="./img/icon_dark_background.png" ></img>Responder</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="col-sm-12">
                                        <h3>Danos tu solución:</h3><br>

                                        <div class="form-group">
                                            <textarea class="form-control" rows="8" id="textArea"></textarea>
                                        </div>
                                        <div class="form-group pull-right">
                                            <button type="button" class="btn btn-success">Publicar</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?= $this->Html->script('jquery-1.11.3') ?>
            <?= $this->Html->script('bootstrap') ?>
            <?= $this->Html->script('main') ?>
            <?= $this->element('defaultScripts'); ?>
            </body>
            </html>

