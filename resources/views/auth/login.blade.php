<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#0f172a;
        }

        .container{
            width:400px;
            background:white;
            padding:35px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        h1{
            text-align:center;
            margin-bottom:25px;
            color:#0f172a;
        }

        .input-group{
            margin-bottom:20px;
        }

        .input-group label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
        }

        .input-group input{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:8px;
            outline:none;
        }

        .input-group input:focus{
            border-color:#2563eb;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            border-radius:8px;
            background:#2563eb;
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#1d4ed8;
        }

        .footer{
            text-align:center;
            margin-top:15px;
        }

        .footer a{
            text-decoration:none;
            color:#2563eb;
        }

        .error{
            background:#fecaca;
            color:#991b1b;
            padding:10px;
            border-radius:8px;
            margin-bottom:15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Login</h1>

        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="footer">
            <p>Don't have an account?
                <a href="/register">Register</a>
            </p>
        </div>
    </div>

</body>
</html>