<?php

include "DB.php";
class Model {
    
    public function getStudent(){
        $sql = "SELECT * FROM tbl_student";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    
    
}
