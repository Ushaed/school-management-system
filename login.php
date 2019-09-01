
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Registration</title>
    <link rel="stylesheet" href="additional/bootstrap.min.css">
</head>
<body>
    <div class="container ">
        <div class="card mt-5">
            <div class="card-header">
                <h3>Login Here</h3>
            </div>
            <?php if(isset($message)):?>
                <div class="alert alert-info">
                    <?php echo "$message"; ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            <div class="card-body">
            <form action='auth.php' method="POST" >
                 <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email"  placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>