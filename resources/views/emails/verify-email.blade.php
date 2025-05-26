<h1>Bonjour {{ $user->name }},</h1>
<p>Merci de vous être inscrit ! Cliquez sur le lien ci-dessous pour vérifier votre email :</p>

<a href="{{ url('/verify-email/' . $token) }}">Vérifier mon email</a>

<p>Si ce n’est pas vous, ignorez ce mail.</p>
<p>Merci !</p>
