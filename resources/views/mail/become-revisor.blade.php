<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReVibe</title>
</head>
<body>

    <div>
        <h1>Un utente ha richiesto di diventare Revisore!!</h1>
        <h2>I suoi dati:</h2>
        <p>Nome: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Vuoi accettare la sua richiesta?</p>
        <a href="">Rendi Revisore</a>
    </div>    

</body>
</html>