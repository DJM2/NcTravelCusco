<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/nc-travel-favicon.ico') }}">
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
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}" target="_blank"
                        rel="nofollow noopener noreferrer" target="_blank" rel="noopener nofollow" class="btn-social">
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
                        <img src="{{ asset('img/logo-nc-travel-colores-origin-2.png') }}" alt="Logo NC Travel Cusco"
                            width="240px">
                        <p class="mt-2">Junte-se a nós nessa aventura inesquecível pelo Peru!</p>
                    </div>
                    <div class="col-lg-12">
                        @if (session('status'))
                            <div class="text-success text-center">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 mt-1">
                        <span class="icon-facebook"
                            onclick="window.open('https://www.facebook.com/MachupicchuCusco', '_blank');"></span>
                        <span class="icon-whatsapp"
                            onclick="window.open('https://wa.me/51984606757?text=Ol%C3%A1%21%20Tenho%20interesse%20em%20viajar%20para%20o%20Peru%20e%20gostaria%20de%20falar%20com%20um%20especialista.', '_blank');"></span>
                        <span class="icon-instagram"
                            onclick="window.open('https://www.instagram.com/nctravelcusco_oficial/', '_blank');"></span>
                        <span class="icon-pinterest"
                            onclick="window.open('https://www.pinterest.es/nctravelcusco/', '_blank');"></span>
                        <span class="icon-tripadvisor"
                            onclick="window.open('https://www.tripadvisor.com.pe/Profile/CuscoC', '_blank');"></span>
                        <span class="icon-youtube"
                            onclick="window.open('https://www.youtube.com/channel/UCBJP3DFKGpcsRnjjTnrf5pA', '_blank');"></span>
                    </div>
                    <div class="col-12 mt-3">
                        <a href="https://wa.me/51984606757?text=Ol%C3%A1%21%20Tenho%20interesse%20em%20viajar%20para%20o%20Peru%20e%20gostaria%20de%20falar%20com%20um%20especialista.
                        "
                            target="_blank">Whatsapp &nbsp;<i class="icon-whatsapp"></i></a>
                        <a href="{{ route('pacotes') }}" target="_blank">Pacotes Peru</a>
                        <a href="{{ route('trilhas') }}" target="_blank">Trilhas Peru</a>
                        <a href="#popup2" class="open-popup">Quero um orçamento!</a>
                        <a href="{{ route('index') }}" target="_blank">Nosso site
                        </a>
                        <a href="{{ route('nosotros') }}" target="_blank">Sobre Nós</a>
                    </div>

                    <!---popup reserva-->
                    <div id="popup2" class="popup">
                        <div class="popup-content">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mx-auto mb-3" id="popupModalLabel">Reserva o seu pacote
                                        para Peru</h5>
                                    <div class="linea-2"></div>
                                    <button type="button" class="close-popup" data-dismiss="modal"
                                        aria-label="Fechar">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body mt-3">
                                    <form action="{{ route('enviar.formulario') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nombre">Nome: *</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="nombre" name="nombre" placeholder="Digite su nombre"
                                                    required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email">Email: *</label>
                                                <input type="email" class="form-control form-control-sm"
                                                    id="email" name="email" placeholder="Digite su e-mail"
                                                    required>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="telefono">Teléfono:<i
                                                        class="icon-whatsapp text-success"></i> *</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="telefono" name="telefono" placeholder="Digite su teléfono"
                                                    required>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="fecha">Data da viagem:</label>
                                                <input type="date" class="form-control form-control-sm"
                                                    id="fecha" name="fecha"
                                                    placeholder="Digite la fecha deseada">
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="nacionalidad">Nacionalidad:</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    id="nacionalidad" name="nacionalidad"
                                                    placeholder="Digite su nacionalidad">
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label for="interes">Tipo de viagem:</label>
                                                <select class="form-control form-control-sm" id="interes"
                                                    name="interes">
                                                    <option value="Família">Viajar en familia</option>
                                                    <option value="Amigos">Viajar con amigos</option>
                                                    <option value="Casal">Viajar em casal</option>
                                                    <option value="Grupo">Viajar em grupo</option>
                                                    <option value="Privado">Viajar em privado</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="mensaje">Mensagem: *</label>
                                                <textarea class="form-control" id="mensaje" name="mensaje" rows="5"
                                                    placeholder="Escreva sua mensagem aqui..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center mt-3">
                                            <button type="submit"
                                                style="background: #0a487c;
                                            color: #fff;
                                            border-radius: 7px;
                                            padding: 0.4em 1.4em; border-none">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .popup {
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.5);
                            display: none;
                            justify-content: center;
                            align-items: center;
                        }

                        .popup-content {
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 5px;
                        }
                    </style>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var openButtons = document.querySelectorAll(".open-popup");
                            var closeButtons = document.querySelectorAll(".close-popup");
                            var popups = document.querySelectorAll(".popup");

                            openButtons.forEach(function(button) {
                                button.addEventListener("click", function(e) {
                                    e.preventDefault();
                                    var target = this.getAttribute("href");
                                    document.querySelector(target).style.display = "flex";
                                });
                            });

                            closeButtons.forEach(function(button) {
                                button.addEventListener("click", function() {
                                    var popup = this.closest(".popup");
                                    popup.style.display = "none";
                                });
                            });

                            // Cerrar el popup al hacer clic fuera de él
                            popups.forEach(function(popup) {
                                popup.addEventListener("click", function(e) {
                                    if (e.target === this) {
                                        this.style.display = "none";
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center" style="color: #fff">
                    <p>© 2023 NC Travel Cusco</p>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
