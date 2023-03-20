<?php
// it accept ony numeric values
function only_integer($param){
    if(preg_match("/^[0-9]+$/", $param)){
        return $param;
    }
    return preg_match("/^[0-9]+$/", $param);
}


?>