<!DOCTYPE html>
<html>

<head>
    <title>Réinitialisation de Mot de Passe</title>
</head>
    <style>
            body {
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
    </style>
<body>

    <h2>Réinitialisation de Votre Mot de Passe</h2><br>
    <h3>Bonjour {{ $user->name_user }},</h3>
    <p>Email :  <strong <strong style="color: blue" >{{ $user->email_user }},</strong></p>
    <p>Cher/Chère <strong>{{ $user->name_user }},</strong></p>
    <p>Vous avez demandé une réinitialisation de votre mot de passe. Cliquez sur le bouton ci-dessous pour réinitialiser votre mot de passe :</p><br>

    <a href="{{ url('/reset-password/' . $user->id) }}" style="background-color: black; color: beige; padding: 10px; text-decoration: none;">Réinitialiser votre mot de passe</a>
    <p>Si vous n'avez pas demandé de réinitialisation de mot de passe, veuillez ignorer cet email.</p>
    <p>Cordialement,<br> L'équipe de l'application</p>

</body>

</html> 



