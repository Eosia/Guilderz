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
    <form method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data" class="col-11 col-sm-11 col-md-10 col-lg-8 col-6 mx-auto">
        <!--protection anti csrf-->
        @csrf

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
            <input class="form-control" type="email" name="email" id="email" placeholder="supermail@localhost.com" 
                value="{!! old('email' ?? '') !!}" min="2" required
            >
            
            @error('name')
                    <div class="error text-danger mt-2 form-text">{{ $error='Vous devez entrer votre adresse email valide' }}</div>
            @enderror
        </div>
        <!--Email/-->

        <!--Sujet-->
        <div class="mt-3">
            <label for="subject" class="form-label">Votre nom</label>
            <input class="form-control" type="text" name="subject"  placeholder="Sujet de votre message ?" value="{!! old('subject' ?? '') !!}" id="subject" min="4" required>

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
        
        <!--bouton d'envoi-->
        <div class="my-3">
            <button type="submit" class="btn btn-primary">ENVOYER</button>
        </div>
        <!--bouton d'envoi/-->



</form>


    </form>
    <!--formulaire/-->

</body>
</html>