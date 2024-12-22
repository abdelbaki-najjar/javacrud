<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="Section_top">
        <div class="container">

        <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
            <?php elseif (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <form action="php/create.php" method="post">
                <h4 class="display-4 text-center">Create</h4><hr><br>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" 
                        class="form-control" 
                        id="nom" 
                        name="nom" 
                        placeholder="Enter Nom" required>
                </div>

                <div class="form-group">
                    <label for="Prenom">Prenom</label>
                    <input type="text" 
                        class="form-control" 
                        id="Prenom" 
                        name="Prenom" 
                        placeholder="Enter Prenom" required>
                </div>

                <div class="form-group">
                    <label for="Age">Age</label>
                    <input type="number" 
                        class="form-control" 
                        id="Age" 
                        name="Age" 
                        placeholder="Enter Age" required>
                </div>

                <button type="submit" class="btn btn-primary" name="create">Create</button>
                <a href="read.php" class="link-primary">View</a>
            </form>
        </div>
    </div>
</body>
</html>
