<!DOCTYPE html>
<html>
<head>
    <title>Réinitialisation de Mot de Passe</title>
    <link href="<?php echo asset('css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-image: url('images/licence.png');
        background-size: cover;
        background-attachment: fixed;
        position: relative;
        height: 100vh;
        overflow: hidden;
    }

    .background-blur {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        backdrop-filter: blur(8px); /*mettre l'image un peu flou */
    }

    .container {
        position: relative;
        z-index: 1;
    }
</style>
<body>
    <div class="background-blur"></div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4" style="border-radius: 15px;">
                    <h2 class="text-center mb-4">Réinitialisation de Votre Mot de Passe</h2>    
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <div class="mb-3">
                            <label for="password" class="form-label">Nouveau Mot de Passe:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmer le Nouveau Mot de Passe:</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Réinitialiser le Mot de Passe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
