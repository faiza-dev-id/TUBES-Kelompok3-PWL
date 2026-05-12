<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h1>Selamat datang, {{ Auth::user()->name }} 🎉</h1>

    <p>Kamu berhasil login.</p>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>