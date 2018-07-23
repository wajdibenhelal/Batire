<?php
include_once '../../config/config.php';
include '../../config/session.php' ;
include '../../log.php';

require('../../vue/template.php');
write_log("List Document by".$_SESSION['idEmp'],"/Applications/MAMP/htdocs/Batire/log.log");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Liste de Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container">

    <div id="header">
        <div id="content">
            <label>Ajouter un dossier </label>
        </div>
    </div> <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Recherche</span>
            <input type="text" name="search_text" id="search_text" placeholder="Recherche par le description ou bien par le numero de document" class="form-control" />
        </div>
    </div>
    <br />
    <div id="result"></div>
</div>
<div style="clear:both"></div>
<br />

<br />
<br />
<br />
</body>
</html>


<script>
    function edit_id(id)
    {
        if(confirm('vous étes sur d ajouter un document pour ce client ?'))
        {
            window.location.href='update.php?editDoc_id='+id;
        }
    }
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"fetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>




