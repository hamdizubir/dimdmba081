<!doctype html>
<html>

    <head>
        <title>LOGIN</title>
    </head>
    <body>

    <form method="POST" action="login">
    {!! csrf_field() !!}
 
    <div>
        Email
        <input type="email" name="email" value="">
    </div>
 
    <div>
        Password
        <input type="password" name="password" id="password">
    </div>
 
    <div>
        <button type="submit">Login</button>
    </div>
</form>


        </body>
            </html>