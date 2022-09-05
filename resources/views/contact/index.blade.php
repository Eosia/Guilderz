<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guilderz</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!--bootstrap/-->

    <!--jquery import-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--jquery import/-->
</head>

<body>

    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('contact') }}">Guilderz</a>
        </div>
    </nav>
    <!--navbar/-->


    <header class="mx-auto text-center py-5">
        <h1>GUILDERZ</h1>
        <h2 class="my-3">NOUS CONTACTER</h2>
    </header>

    <!--notifications-->
    <div class="container-fluid my-3">
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                <p class="text-center mx-auto">{{ session('success') }}</p>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>

    <!--notification/-->

    <!--formulaire-->
    <form method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data" class="col-11 col-sm-11 col-md-10 col-lg-8 col-6 mx-auto mb-5">
        <!--protection anti csrf-->
        @csrf

        <!--honeypot-->
        <x-honeypot />
        <input name="myField" type="text" class="d-none">
        <!--honeypot/-->

        <!--Nom-->
        <div class="mt-3">
            <label for="name" class="form-label">Votre nom</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="John Doe" value="{!! old('name' ?? '') !!}" min="2" required>

            @error('name')
            <div class="error text-danger mt-2 form-text">{{ $error='Vous devez entrer un nom de plus de deux caractères' }}</div>
            @enderror
        </div>
        <!--Nom/-->

        <!--Email-->
        <div class="my-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="supermail@localhost.com" value="{!! old('email' ?? '') !!}" min="2" required>

            @error('name')
            <div class="error text-danger mt-2 form-text">{{ $error='Vous devez entrer votre adresse email valide' }}</div>
            @enderror
        </div>
        <!--Email/-->

        <!--Sujet-->
        <div class="mt-3">
            <label for="subject" class="form-label">Sujet du message</label>
            <input class="form-control" type="text" name="subject" placeholder="Sujet de votre message ?" value="{!! old('subject' ?? '') !!}" id="subject" min="4" required>

            @error('name')
            <div class="error text-danger mt-2 form-text">{{ $error='Vous devez entrer un sujet de plus de quatres caractères' }}</div>
            @enderror
        </div>
        <!--Sujet/-->

        <!--Message-->
        <div class="my-3">
            <label for="message" class="form-label">Votre message</label>
            <textarea class="form-control" type="text" name="message" id="message" rows="4" min="10" placeholder="Votre super message" required>{!! old('message' ?? '') !!}</textarea>

            @error('name')
            <div class="error text-danger mt-2 form-text">{{ $error='Vous devez entrer un message' }}</div>
            @enderror
        </div>
        <!--Message/-->

        <!--captcha-->
        <div>
            <div class="w-full flex flex-col mt-8">
                <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                    <label for="captcha" class="col-12 control-label">Veuillez remplir le captcha pour envoyer le message</label>
                    <div class="col-md-12">
                        <div class="captcha my-3">
                            <span>{!! captcha_img() !!}</span>
                            <br>
                            <button type="button" class="btn btn-md btn-success my-3 btn-refresh">
                                Refraichir le captcha
                            </button>
                        </div>
                        <input id="captcha" type="text" class="form-control" placeholder="Entrer le captcha" name="captcha" required>
                        <div class="mt-3">

                        @error('captcha')
                            <div class="error text-danger mt-2 form-text">{{ $error='Captcha invalide' }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--captcha-->


        <!--bouton d'envoi-->
        <div class="my-3">
            <button type="submit" class="btn btn-primary">ENVOYER</button>
        </div>
        <!--bouton d'envoi/-->

    </form>
    <!--formulaire/-->

    <!--script capctha-->
    <script type="text/javascript">
        $(".btn-refresh").click(function() {
            $.ajax({
                type: 'GET',
                url: '/refresh_captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
    <!--script captcha/-->

</body>

</html>