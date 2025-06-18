<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau message de contact</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px;">
    <table width="100%" style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 25px; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.05);">
        <tr>
            <td>
                <h2 style="color: #333333;">📩 Nouveau message depuis le formulaire de contact</h2>

                <p style="font-size: 16px; color: #555;"><strong>Nom :</strong> {{ $data['name'] }}</p>
                <p style="font-size: 16px; color: #555;"><strong>Email :</strong> <a href="mailto:{{ $data['email'] }}" style="color: #007bff;">{{ $data['email'] }}</a></p>
                <p style="font-size: 16px; color: #555;"><strong>Sujet :</strong> {{ $data['subject'] }}</p>

                <hr style="margin: 20px 0;">

                <p style="font-size: 16px; color: #555;"><strong>Message :</strong></p>
                <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #007bff; border-radius: 4px; color: #333; font-size: 15px; white-space: pre-line;">
                    {{ $data['message'] }}
                </div>

                <p style="font-size: 14px; color: #999; margin-top: 30px;">Ce message a été envoyé depuis votre site via le formulaire de contact.</p>
            </td>
        </tr>
    </table>
</body>
</html>
