<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CampusCore</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    background:linear-gradient(135deg,#081c4d,#0b3b91,#1f5db8);
    overflow:hidden;
}

.circle1{
    position:absolute;
    width:320px;
    height:320px;
    background:rgba(255,255,255,0.08);
    border-radius:50%;
    top:-120px;
    left:-100px;
}

.circle2{
    position:absolute;
    width:260px;
    height:260px;
    background:rgba(255,255,255,0.06);
    border-radius:50%;
    bottom:-90px;
    right:-70px;
}

.container{
    width:90%;
    max-width:700px;
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(12px);
    border:1px solid rgba(255,255,255,.25);
    border-radius:25px;
    padding:43px;
    text-align:center;
    color:white;
    box-shadow:0 15px 40px rgba(0,0,0,.35);
}
    .logo{
    width:90px;
    height:90px;
    margin:0 auto 20px;
    border-radius:50%;
    background:white;
    color:#0b3b91;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:38px;
    font-weight:bold;
    box-shadow:0 0 20px rgba(255,255,255,.4);
}



h1{
    font-size:60px;
    margin-bottom:10px;
    letter-spacing:2px;
}

h2{
    font-size:22px;
    color:#dbeafe;
    letter-spacing:4px;
    font-weight:normal;
    margin-bottom:25px;
}

p{
    font-size:18px;
    line-height:1.8;
    color:#eef4ff;
    margin-bottom:40px;
}

.btn{
    display:inline-block;
    padding:18px 60px;
    background:#4f8dfd;
    color:white;
    text-decoration:none;
    border-radius:15px;
    font-size:22px;
    font-weight:bold;
    transition:.3s;
    box-shadow:0 0 20px rgba(79,141,253,.6);
}

.btn:hover{
    transform:scale(1.08);
    background:#6aa4ff;
    box-shadow:0 0 35px rgba(79,141,253,.9);
    animation:fadeIn 1s ease;
}

.footer{
    margin-top:40px;
    font-size:14px;
    color:#dbeafe;
}
@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}



</style>

</head>

<body>

<div class="circle1"></div>
<div class="circle2"></div>

<div class="container">

<div class="logo">🎓</div>

<h1>CampusCore</h1>

<h2>UNIVERSITY MANAGEMENT SYSTEM</h2>

<p>
Welcome to CampusCore.<br>
Manage students, results and academic records through one secure platform.
</p>

<a href="dashboard.php" class="btn">WELCOME</a>

<div class="footer">
Empowering Education Through Smart Management
</div>

</div>

</body>
</html>