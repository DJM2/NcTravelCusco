<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('img/img/icono-home.png')}}">
    <title>Viagem ao Peru e Machu Picchu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <!--metas---->
    <meta name="description"
        content="Explore a mágica cidade inca de Machu Picchu. Descubra a antiga civilização e as incríveis paisagens do Peru. Reserve sua viagem hoje mesmo.">
    <meta property="og:title" content="Machu Picchu - Descubra a Cidade Inca Perdida">
    <meta property="og:description"
        content="Explore a mágica cidade inca de Machu Picchu. Descubra a antiga civilização e as incríveis paisagens do Peru. Reserve sua viagem hoje mesmo.">
    <meta property="og:image" content="https://www.trilhaincacuzco.com/img/galeria/Visita-machu-picchu.webp">
    <meta property="og:url" content="https://example.com/machu-picchu">
    <meta property="og:type" content="website">
</head>

<body>
    <!--boton compartir-->
    <a href="#" class="compartir" data-toggle="modal" data-target="#popupModal">
        <span class="icon-share share"></span>
      </a>
    <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="popupModalLabel">Compartilhar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <a href="" target="_blank"><i class="icon-facebook mt-2"></i>&nbsp; Compartilhar no Facebook</a>
                    <a href="" target="_blank"><i class="icon-twitter"></i> Compartilhar no Twitter</a>
                    <a href="" target="_blank"><i class="icon-pinterest"></i> Compartilhar no Pinterest</a>
                    <a href="" target="_blank"><i class="icon-linkedin"></i> Compartilhar no Linkedin</a> --}}
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}" target="_blank"
                        rel="nofollow noopener noreferrer" target="_blank" rel="noopener nofollow"
                        class="btn-social">
                        <i class="icon-facebook"></i> Compartilhar no Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}" target="_blank"
                        rel="nofollow noopener noreferrer" target="_blank" rel="noopener" class="btn-social">
                        <i class="icon-twitter"></i> Compartilhar no Twitter
                    </a>
                    <a href="https://wa.me/?text={{ request()->fullUrl() }}" target="_blank" rel="noopener"
                        class="btn-social">
                        <i class="icon-whatsapp"></i> Compartilhar no WhatsApp
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ request()->fullUrl() }}"
                        target="_blank" rel="noopener" class="btn-social">
                        <i class="icon-linkedin"></i> Compartilhar no Pinterest
                    </a>
                    <a href="https://www.pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{ urlencode('Tudo o que você precisa saber para viajar para Machu Picchu') }}"
                        target="_blank" rel="noopener" class="btn-social">
                        <i class="icon-pinterest"></i> Compartilhar no Pinterest
                    </a>
                </div>
                
            </div>
        </div>
    </div>

    <div class="container-sm text-center mt-5">
        <div class="row">
            <div class="container">
                <div class="row contenedor">
                    <div class="col-12">
                        <img src="{{ asset('img/logo-nc-travel-colores-origin.png') }}" alt="Logo NC Travel Cusco"
                            width="200px">
                        <p class="mt-2">Nós temos milhares de clientes satisfeitos!</p>
                    </div>
                    <div class="col-12 mt-1">
                        <span class="icon-facebook" onclick="window.open('https://www.facebook.com/MachupicchuCusco', '_blank');"></span>
                        <span class="icon-whatsapp" onclick="window.open('https://wa.me/51984606757?text=Ol%C3%A1%21%20Tenho%20interesse%20em%20viajar%20para%20o%20Peru%20e%20gostaria%20de%20falar%20com%20um%20especialista.', '_blank');"></span>
                        <span class="icon-instagram" onclick="window.open('https://www.instagram.com/nctravelcusco_oficial/', '_blank');"></span>
                        <span class="icon-pinterest" onclick="window.open('https://www.pinterest.es/nctravelcusco/', '_blank');"></span>
                        <span class="icon-tripadvisor" onclick="window.open('https://www.tripadvisor.com.pe/Profile/CuscoC', '_blank');"></span>
                    </div>
                    <div class="col-12 mt-3">
                        <a href="https://wa.me/51984606757?text=Ol%C3%A1%21%20Tenho%20interesse%20em%20viajar%20para%20o%20Peru%20e%20gostaria%20de%20falar%20com%20um%20especialista.
                        " target="_blank">Fale por WhatsApp com um especialista <i class="icon-open_in_new"></i></a>
                        <a href="https://nctravelcusco.com/pacotes-machu-picchu" target="_blank">Pacotes para Machu Picchu 2023 <i
                                class="icon-open_in_new"></i></a>
                        <a href="https://trilhaincacuzco.com/trilha-inca" target="_blank">Pacotes para Trilha Inca 2023 <i
                                class="icon-open_in_new"></i></a>
                        <a href="" target="_blank">Perguntas Frequentes Machu Picchu <i
                                class="icon-open_in_new"></i></a>
                        <a href="" target="_blank">Pedir orçamento <i class="icon-open_in_new"></i></a>
                        <a href="https://nctravelcusco.com/quem-somos" target="_blank">Quem somos <i class="icon-open_in_new"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 100vh"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
