<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script>
        var windowe = false;
        window.onload = function() {
            document.getElementById("finfiler").onclick=function() {
                if(windowe == false){
                    var height = window.outerHeight-70;
                    var left = (window.innerWidth/2)-112;
                    if(left < 0){
                        left = 0
                    }
                    windowe = window.open("filfinder.php?", "Fileeater", "width=450,height="+height+",top=0,left="+left);


                    windowe.onbeforeunload = function(){
                        windowe = false;
                    };
                    windowe.focus();
                }else{
                    windowe.focus()
                }
            };
        };
        window.onbeforeunload = function(){
            if(windowe !== false){
                windowe.close();
            }
        };
        function setValue(url){
            document.getElementById("finfiler").value=url;
            windowe = false;
        }

    </script>
</head>
<body>

<input placeholder="Tryk for at vælg fil" readonly id="finfiler">

</body>
</html>