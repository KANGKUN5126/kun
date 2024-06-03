<?php
    function PutMessageLocation($msg,$url){
        $print  = "<script type=\"text/javascript\">\n//<![CDATA[\n";
        $print .= "alert(\"${msg}\");\n";
        $print .= "location.href='${url}';\n";
        $print .= "//]]>\n</script>\n";
        print($print);
        exit;
    }

    function PutMessageBack($msg){
        $print  = "<script type=\"text/javascript\">\n//<![CDATA[\n";
        $print .= "alert(\"${msg}\");\n";
        $print .= "history.back();\n";
        $print .= "//]]>\n</script>\n";
        print($print);
        exit;
    }
?>