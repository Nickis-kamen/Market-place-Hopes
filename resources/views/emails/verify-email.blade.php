<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification d'email</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <table width="100%" style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <tr>
            <td>
                <h1 style="color: #333;">Bonjour {{ $user->name }},</h1>

                <p style="font-size: 16px; color: #555;">
                    Merci de vous être inscrit sur notre plateforme !
                </p>
                <p style="font-size: 16px; color: #555;">
                    Veuillez cliquer sur le bouton ci-dessous pour <strong>vérifier votre adresse email</strong> :
                </p>

                <p style="text-align: center; margin: 30px 0;">
                    <a href="{{ url('/verify-email/' . $token) }}" style="background-color: #007bff; color: #ffffff; padding: 12px 20px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                        Vérifier mon email
                    </a>
                </p>

                <p style="font-size: 14px; color: #999;">
                    Si vous n’êtes pas à l’origine de cette inscription, vous pouvez ignorer cet email.
                </p>

                <p style="font-size: 14px; color: #999; margin-top: 30px;">
                    — L'équipe Marketplace
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
