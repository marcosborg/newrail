@extends('layouts.website')
@section('header')
<!-- ======= Hero Section ======= -->
<section id="hero">

    <div class="hero-text" data-aos="zoom-out">
        <h2>Benvindo à NewRail</h2>
        <p>Se estiver a viajar num comboio Alfa ou Intercidades, veja o que temos para si.</p>
        <p>The new generation of railway catering</p>
        <a href="#about" class="btn-get-started scrollto">Venha conhecer-nos</a>
    </div>

    <div class="product-screens">

        <div class="product-screen-1" data-aos="fade-up" data-aos-delay="400">
            <img src="/website/assets/img/product-screen-1.png" alt="">
        </div>

        <div class="product-screen-2" data-aos="fade-up" data-aos-delay="200">
            <img src="/website/assets/img/product-screen-2.png" alt="">
        </div>

        <div class="product-screen-3" data-aos="fade-up">
            <img src="/website/assets/img/product-screen-3.png" alt="">
        </div>

    </div>

</section><!-- End Hero Section -->
@endsection
@section('content')
<!-- ======= About Section ======= -->
<section id="about" class="section-bg">
    <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
            <h3 class="section-title">A empresa</h3>
            <span class="section-divider"></span>
            <p class="section-description">
                Quem somos e o que fazemos por si
            </p>
        </div>

        <div class="row">
            <div class="col-lg-6 about-img" data-aos="fade-right" dat-aos-delay="100">
                <img src="/website/assets/img/about-img.jpg" alt="">
            </div>

            <div class="col-lg-6 content" data-aos="fade-left" dat-aos-delay="100">
                <h2>Bem-vindo à NewRail</h2>
                <h3>The new generation of railway catering</h3>
                <p>Na NewRail, estamos a redefinir a experiência de viagem nos comboios Alfa e Intercidades.
                    Como líderes em
                    catering ferroviário, nosso compromisso é proporcionar-lhe uma viagem excepcional, onde a
                    comodidade e o
                    sabor se encontram.</p>
                <p>Oferecemos-lhe a liberdade de escolher as suas refeições e bebidas favoritas durante a
                    viagem, sem
                    precisar se deslocar ao bar. Com a nossa inovadora aplicação disponível em iOS e Android,
                    vai poder
                    explorar o nosso menu diversificado, selecionar suas opções preferidas e efetuar o pagamento
                    online. Não
                    importa onde esteja sentado, nossa equipe dedicada entregará suas escolhas diretamente no
                    seu lugar,
                    tornando a experiência de viagem ainda mais agradável.</p>
                <p>Na NewRail, acreditamos que a sua viagem merece um toque de conforto e sabor. Estamos
                    comprometidos em
                    elevar os padrões do catering ferroviário, garantindo que cada passageiro desfrute de
                    refeições deliciosas
                    e um atendimento impecável.</p>
                <p>Descarregue a nossa aplicação e desfrute da viagem.</p>
            </div>
        </div>

    </div>
</section><!-- End About Section -->

<!-- ======= Featuress Section ======= -->
<section id="features">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-8 offset-lg-4">
                <div class="section-header">
                    <h3 class="section-title">O que pode esperar?</h3>
                    <span class="section-divider"></span>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 features-img">
                <img src="/website/assets/img/product-features.png" alt="" data-aos="fade-right">
            </div>

            <div class="col-lg-8 col-md-7 ">

                <div class="row">

                    <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                        <div class="icon"><i class="bi bi-binoculars"></i></div>
                        <h4 class="title"><a href="">Exploração Simplificada</a></h4>
                        <p class="description">Navegue no nosso menu diversificado de refeições e bebidas
                            diretamente na
                            aplicação. Visualize opções deliciosas e escolha o que mais lhe agrada durante a sua
                            viagem.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                        <div class="icon"><i class="bi bi-wallet2"></i></div>
                        <h4 class="title"><a href="">Conveniência Total</a></h4>
                        <p class="description">Faça os pedidos e efetue os pagamentos de forma rápida e segura
                            através da
                            aplicação. Não há necessidade de deslocar-se ao bar; trazemos tudo até si.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 box" data-aos="fade-up" dat-aos-delay="100">
                        <div class="icon"><i class="bi bi-person-badge"></i></div>
                        <h4 class="title"><a href="">Atendimento Personalizado</a></h4>
                        <p class="description">Personalize suas refeições de acordo com suas preferências.
                            Escolha entre uma
                            variedade de pratos e opções de bebidas para garantir que a sua viagem seja
                            acompanhada do sabor que
                            mais gosta.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-box2-heart"></i></div>
                        <h4 class="title"><a href="">Entrega Direta</a></h4>
                        <p class="description">Relaxe e desfrute da sua viagem enquanto nossa equipe entrega
                            suas escolhas
                            diretamente no seu lugar. Sem complicações, sem interrupções – apenas sabores
                            excepcionais onde
                            estiver sentado.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section><!-- End Featuress Section -->

<!-- ======= Call To Action Section ======= -->
<section id="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 text-center text-lg-start">
                <h3 class="cta-title">Descarregue a APP</h3>
                <p class="cta-text">Faça da sua viagem uma experiência gastronômica sem igual. Baixe agora a
                    nossa aplicação
                    e desfrute do catering ferroviário do futuro.</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="#">Descarregar a APP</a>
            </div>
        </div>

    </div>
</section><!-- End Call To Action Section -->

<!-- ======= Contact Section ======= -->
<section id="contact">
    <div class="container" data-aos="fade-up">
        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="contact-about">
                    <img src="/website/assets/img/logo.png" width="200">
                    <p>Na NewRail, estamos a redefinir a experiência de viagem nos comboios Alfa e Intercidades.
                        Como líderes
                        em catering ferroviário, nosso compromisso é proporcionar-lhe uma viagem excepcional,
                        onde a comodidade
                        e o sabor se encontram.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="info">
                    <div>
                        <i class="bi bi-geo-alt"></i>
                        <p>Rua Bica do Sapato Cais 01<br>1100-353 Lisboa<br>Santa Apolónia.</p>
                    </div>

                    <div>
                        <i class="bi bi-envelope"></i>
                        <p>comercial@newrail.pt</p>
                    </div>

                    <div>
                        <i class="bi bi-phone"></i>
                        <p>+351 937 758 003</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-8">
                <div class="form">
                    <form action="/form-contact" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="name" class="form-control" placeholder="Nome" required>
                            </div>
                            <div class="form-group col-lg-6 mt-3 mt-lg-0">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" name="phone" placeholder="Contacto telefonico">
                            </div>
                            <div class="form-group col-lg-6 mt-3 mt-lg-0">
                                <input type="text" class="form-control" name="subject" placeholder="Assunto">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Mensagem"
                                required></textarea>
                        </div>
                        <div class="text-center mt-4"><button type="submit">Enviar mensagem</button></div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
@endsection