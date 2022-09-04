<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de Guilderz.xyz</title>
</head>
<body>

<main class="container-fluid">
    <div class="row mx-auto">
        <div class="mx-auto text-center">
            <div class="card text-center my-5">
                <div class="card-header">
                    Nouveau message de {{ $details['name'] }}
                </div>
                <div class="card-body">
                    <h1 class="card-title">Email du contact :  {{ $details['email'] }}</h1>
                    <h2 class="card-title">Sujet du message: {{ $details['subject'] }}</h2>
                    <span class="card-title" style="color: red;">Ip de l'auteur du message: {{ $ip }}</span>
                    <p class="card-text flex-column justify-content-evenly align-items-center">Contenu du message :
                        <br>
                        <span class="my-5">
                            {{ $details['message'] }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
