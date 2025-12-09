<?php
    $fileInput = $_FILES['fileInput'] ?? null;
    try {
        if(!$fileInput || $fileInput['error'] !== UPLOAD_ERR_OK){
            throw new Exception("No file uploaded.",401);
        }
        $fileName = $fileInput['name'];
        if(pathinfo($fileName, PATHINFO_EXTENSION) !== 'txt'){
            throw new Exception("Invalid file type. Only .txt files are allowed.",402);
        }
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage()." Code: ".$e->getCode();
    }finally{
        echo "\nFile upload attempt completed.";
    }
?>