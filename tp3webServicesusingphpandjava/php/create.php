<?php 

function insertEmployee($employee) {
    $url = "http://localhost:8080/TP3/webapi/crud/insertion";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($employee));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch);
        curl_close($ch);
        return false; 
    }

    curl_close($ch);

    return true;
    
    


    
    

    
}

if (isset($_POST['create'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['Prenom']);
    $age = validate($_POST['Age']);

    
    $param = new stdClass(); 
    $param->nom = $nom; 
    $param->prenom = $prenom; 
    $param->age = $age; 

    
    $result = insertEmployee($param);

    
    if ($result) {
        
        header("Location: ../index.php?success=Employee successfully created");
        exit();
    } else {
        
        $errorMessage = isset($result['message']) ? $result['message'] : "Unknown error occurred";
        header("Location: ../index.php?error=" . urlencode("Failed to create employee: " . $errorMessage));
        exit();
    }
    
}
