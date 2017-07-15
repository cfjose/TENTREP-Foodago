<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Current Tray';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/bootssnipp.css" rel='stylesheet' type='text/css' />
<style>
.droptarget {
    float: left; 
    width: 100px; 
    height: 35px;
    margin: 15px;
    padding: 10px;
    border: 1px solid #aaaaaa;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
	 <br>
            <div class="col-md-12">
                <div class="col-md-8">
                    <!--TRAY-->
                    <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4>Current Tray</h4></div>
                    <div class="panel-body">
                    <table class="table borderless">

                    <div class="col-md-4">
                    <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4>UserOne</h4></div>
                    <div class="panel-body" ondrop="drop(event)" ondragover="allowDrop(event)">
                          <p ondragstart="dragStart(event)" draggable="true" id="dragtarget"> ITEM NAME</p>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4>UserTwo</h4></div>
                    <div class="panel-body" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="panel-body" align="center">
                    <button type="button" class="btn btn-primary btn-lg">Add User</button>
                    </div>
                    </div>
                    

                    <p id="demo"></p>

                        <script>
                        function dragStart(event) {
                            event.dataTransfer.setData("Text", event.target.id);
                            document.getElementById("demo").innerHTML = "Started to drag the ITEM NAME";
                        }

                        function allowDrop(event) {
                            event.preventDefault();
                        }

                        function drop(event) {
                            event.preventDefault();
                            var data = event.dataTransfer.getData("Text");
                            event.target.appendChild(document.getElementById(data));
                            document.getElementById("demo").innerHTML = "The ITEM NAME appointed to UserOne";
                        }
                        </script>
                    </table> 
                    </div>
                    </div>

                    
                    <!--TRAY END-->


                </div>
                <div class="col-md-4">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Review Order</h4>
                        </div>
                        <div class="panel-body">
                                <div class="col-md-12">
                                    <strong>Subtotal (# item)</strong>
                                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                                </div>
                                <div class="col-md-12">
                                    <strong>Delivery Fee</strong>
                                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                                </div>

                                <hr align="left" width="50%">

                                <div class="col-md-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span>150.00</span></div>
                                    <hr>
                                </div>
                                
                                <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
                                
                        </div>
                        
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                </div>
                </div>
</div>
</body>
</html>