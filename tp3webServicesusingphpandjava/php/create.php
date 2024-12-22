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

    // التحقق من المدخلات
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['Prenom']);
    $age = validate($_POST['Age']);

    // إعداد البيانات لإرسالها إلى API
    $param = new stdClass(); 
    $param->nom = $nom; 
    $param->prenom = $prenom; 
    $param->age = $age; 

    // إرسال الطلب
    $result = insertEmployee($param);

    // التحقق من النتيجة
    if ($result) {
        // افتراض أن الاستجابة تشير إلى النجاح مباشرةً
        header("Location: ../index.php?success=Employee successfully created");
        exit();
    } else {
        // في حالة وجود مشكلة
        $errorMessage = isset($result['message']) ? $result['message'] : "Unknown error occurred";
        header("Location: ../index.php?error=" . urlencode("Failed to create employee: " . $errorMessage));
        exit();
    }
    
}
