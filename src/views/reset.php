<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stash Password Reset - RAK Wireless</title>
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
    
    <?php if (isset($xom) && $xom[0] === true): ?>
    <p style="background-color: #18374c;margin-top: 0px;padding: 10px;"><?=$xom[1];?></p>
    <?php endif; ?>

    <h1>Password Reset</h1>

    <input type="email" name="email" placeholder="Email Address" required="true" class="txt-input poppins">
    
    <div class="btn-group">
        <button class="btn poppins" type="submit">Reset</button>
    </div>
    </div>
    
    </form>

    <p class="margin-bottom-zero">Want an invitation code?<br><a href="#" style="color:#f1c40f;">Contact us</a></p>

</div>
</div>
</div>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/stash.js" type="text/javascript"></script>
</body>
</html>

