<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stash Sign Up - RAK Wireless</title>
    <link href='//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>
    <link href='/assets/css/stash.css' rel='stylesheet' type='text/css'>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#3498db">
    

</head>
<body>

<div class="outer">
<div class="middle">
<div class="center">

    <form method="post">
    <div class="box">
    
    <?php if (isset($xua) && $xua[0] === true): ?>
    <p style="background-color: #18374c;margin-top: 0px;padding: 10px;"><?=$xua[1];?></p>
    <?php endif; ?>

    <h1>Sign Up</h1>

    <input type="text" name="invitation_code" placeholder="Invitation Code" required="true" class="txt-input poppins">
    <input type="email" name="email" placeholder="Email Address" required="true" class="txt-input poppins">
    
    <input type="password" name="password" placeholder="Password" required="true" class="txt-input poppins">
    <input type="password" name="password_confirm" placeholder="Confirm Password" required="true" class="txt-input poppins">
    
    <div class="btn-group">
        <button class="btn poppins m-8right" type="submit">Sign Up</button>
        <a class="td-none m-8left" href="/"><div class="btn2 poppins">Sign In</div></a>
    </div>
    </div>
    
    </form>

    <p class="margin-bottom-zero">By signing up, you thereby agree<br>to our <a href="#" style="color:#f1c40f;">Terms of Service</a></p>

</div>
</div>
</div>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/stash.js" type="text/javascript"></script>
</body>
</html>

