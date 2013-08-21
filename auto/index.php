<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/demos.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.ui.base.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.ui.theme.css" />
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type='text/javascript' src='js/jquery.ui.core.js'></script>
<script type='text/javascript' src='js/jquery.ui.widget.js'></script>
<script type='text/javascript' src='js/jquery.ui.menu.js'></script>
<script type='text/javascript' src='js/jquery.ui.autocomplete.js'></script>
    <script>
$(function() {
  
    
    $( "#project" ).autocomplete({
        minLength: 0,
        source:'server.php',
        focus: function( event, ui ) {
            $( "#project" ).val( ui.item.label );
            return false;
        },
        select: function( event, ui ) {
            $( "#project" ).val( ui.item.label );
          
          
            
            return false;
        }
    })
    
    .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( "<a>" + item.label + 
                "<span >" + item.desc + "</span></a>" )
                //"<span style='font-size: 60%;'>Other: " + item.other + "</span></a>" )
            .appendTo( ul );
    };
});
	</script>
</head>
<body><div class="ui-widget">
<input id="project" />
<input type="hidden" id="project-id" />
<p id="project-title"></p><p id="project-description"></p><p id="project-other"></p>
</div>


</body>
</html>
