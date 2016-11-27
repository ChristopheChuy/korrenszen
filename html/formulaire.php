
<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>Bootstrap Example</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

        <!-- Datepicker Bootstrap -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.0/moment.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.0/locale/fr.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">







    </head>
    <body>
        <form action="" method="POST">
            <div class="container">

                <div class="row">

                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <h4>Gare de Départ :</h4>
                        <select name="villedep" class="form-control" id="sel1">
                            <?php include 'config.php'; ?>
                            <?php
                            $query = $db->query("SELECT nom_gare FROM gare");
                            while ($row = $query->fetch_assoc()) {
                                $data = $row['nom_gare'];
                                ?>
                                <option value="<?php echo $data; ?>"><?php echo $data; ?> </option> 


<?php } ?>

                        </select>
                    </div>
                    <div class="col-md-3">
                        <h4>Gare d'Arrivée :</h4>
                        <select name="villearr" class="form-control" id="sel2">
                            <?php include 'config.php'; ?>
                            <?php
                            $query = $db->query("SELECT nom_gare FROM gare");
                            while ($row = $query->fetch_assoc()) {
                                $data = $row['nom_gare'];
                                ?>
                                <option value="<?php echo $data; ?>"><?php echo $data; ?> </option> 


<?php } ?>

                        </select>
                    </div>

                </div>



                <div class="row">
                    <div class="col-md-3"></div>
                    <div class='col-md-3'>
                        <h4>Départ le :</h4>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'>
                                 <input id="ville1" name="ville1" type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                  
                    <div class='col-md-3'>
                        <h4>Arrivée le :</h4>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker2'>
                                <input name="ville2" type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('.datepicker').datepicker({
                            format: 'mm/dd/yyyy',
                            
                        });
                        $(function () {
                            $('#datetimepicker1').datetimepicker();
                        });
                    </script>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker2').datetimepicker();
                        });


                    </script>

                </div>


                <div style="text-align: center;">
                <label class="col-md-3 btn btn-primary"><img src="../img/bouton bleu texte.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item3" value="3" class="hidden" autocomplete="off" ></label>
                <label class="col-md-3 btn btn-primary"><img src="../img/bouton orange texte.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk2" id="item2" value="2" class="hidden" autocomplete="off"></label>
                <label class="col-md-3 btn btn-primary"><img src="../img/bouton vert texte.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk3" id="item5" value="5" class="hidden" autocomplete="off"></label>
                <label class="col-md-3 btn btn-primary"><img src="../img/bouton rouge texte.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk4" id="item4" value="4" class="hidden" autocomplete="off" ></label>
                </div>

                <div class="row" style="text-align: center;">
                    <div class="col-md-4"></div>
                    <button type="submit" name="submit" class="col-md-4 btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-refresh"></span> Affiche
                    </button>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <br>
                </div>
                <?php if(isset($_POST['submit'])){
                    if (!empty($_POST['ville1'])){
                    
                    include ('./formi.php');}
                    
                    else
                  {?>
            
           <div class="alert alert-danger">
            <strong>Danger!</strong> Veuillez remplir tous les champs.
            </div>
            
                <?php }}
        
                ?>
                
            </div>
        </form>
            
    </body>
</html>

<style>
    #custom-search-input{
        padding: 1px;
        border: solid 1px #E4E4E4;
        border-radius: 12px;
        background-color: #fff;
    }

    #custom-search-input input{
        border: 0;
        box-shadow: none;
    }

    #custom-search-input button{
        margin: 0 0 0 0;
        background: none;
        box-shadow: none;
        border: 0;
        color: #666666;
        padding: 0 8px 0 10px;
        border-left: solid 1px #ccc;
    }

    #custom-search-input button:hover{
        border: 0;
        box-shadow: none;
        border-left: solid 1px #ccc;
    }

    #custom-search-input .glyphicon-search{
        font-size: 14px;
    }
    .container{

        margin-top: 50px;

    }
    .center-block {
        display: block;
        margin-left: auto;
        margin-right: auto;


    }

    .check
    {
        opacity:0.5;
        color:#EEEEEE;
        background-color:#EEEEEE;
        border-color: activeborder;

    }
    .btn-primary {
        background-color: white;
        border-color: #FFFFFF;
        color: #fff;
    }
    .btn-primary:hover {
        background-color: #FFFFFF;
        border-color: #FFFFFF;

    }


</style>
<script>
    $(document).ready(function (e) {
        $(".img-check").click(function () {
            $(this).toggleClass("check");
        });
    });
</script>    


