<?php

class Format{
    public function formatDate($date){
       return date('F j,Y.',strtotime($date));
    }

}

?>
