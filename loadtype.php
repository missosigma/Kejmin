<?php
session_start();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="utf-8" />
<meta name="robots" content="noindex, nofollow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>


$(document).ready(function(){
    loadProgressBar($('#progressBar'));
});

// SET INTERVAL IN MILLISECONDS TO REPEAT THE FUNCTION
var intval   = 1000ms;
var pBLoader = setInterval(function(){ loadProgressBar($("#progressBar")); }, intval);

// A VARIABLE TO HOLD THE RESPONSE FROM THE BACKGROUND SCRIPT
var percent = 0;

function loadProgressBar(element) {
    $.get("jquery_progress_bar_server.php", function(percent){
        if (percent <= 99){
            var pbWidth = percent * element.width() / 100;
            element.find('div').animate({ width:pbWidth }, 333);
            element.find('div').html(percent + "%&nbsp;");
        } else{
            clearInterval(pBLoader);
            element.css('background-color', 'transparent' );
            element.find('div').css('text-align', 'center' );
            element.find('div').html("All Done!");
            element.fadeTo(3000, 0.2, function(){
                element.hide('slow');
            });
        }
    });
}

</script>

<style type="text/css">
#progressBar {
    width:400px;
    height:22px;
    background-color:blue;
}

#progressBar div {
    height:100%;
    color:yellow;
    font-family:verdana;
    text-align:right;
    line-height:22px; /* same as #progressBar height if we want text middle aligned */
    width:0;
    background-color:darkgreen;
}
</style>

<title>Hi im waiting</title>
</head>
<body>

<div>T</div>

<div id="progressBar">
<div></div>
</div>

<div>T</div>

</body>
</html>