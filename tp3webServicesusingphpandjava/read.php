<?php 
$url = "http://localhost:8080/TP3/webapi/crud/getEmp";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Read Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="Section_top">
        <div class="container">
            <div class="box">
                <h4 class="display-4 text-center">List of Employees</h4><br>
                <?php if ($data): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $index => $employee): ?>
                                <tr>
                                    <th scope="row"><?php echo $index + 1; ?></th>
                                    <td><?php echo htmlspecialchars($employee['nom']); ?></td>
                                    <td><?php echo htmlspecialchars($employee['prenom']); ?></td>
                                    <td><?php echo htmlspecialchars($employee['age']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-danger" role="alert">
                        No employees found or an error occurred while fetching data.
                    </div>
                <?php endif; ?>
                <div class="link-right">
                    <a href="index.php" class="link-primary">Create</a>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
