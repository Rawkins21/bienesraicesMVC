<main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Yo que nací sin poder Yo que luché por la libertad Pero nunca la pude tener Yo que viví entre fachistas Yo que morí en el altar Yo que nací con los que estaban bien Pero a la noche estaba todo mal Hoy paso el tiempo (Demoliendo hoteles)
                    Mientras los plomos juntan los cables Cazan rehenes</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Hoy paso el tiempo (Demoliendo hoteles) Mientras los chicos allá en la esquina Pegan carteles Yo fui educado con odio Y odiaba la humanidad Un día me fui con los hippies y tuve un amor y mucho más</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Ahora no estoy más tranquilo Y por qué tendría que estar Todos crecimos sin entender Y todavía me siento un anormal Hoy paso el tiempo (Demoliendo hoteles) Mientras los plomos juntan los cables Cazan rehenes</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Deptos en Venta</h2>

        <?php 
            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Texto entrada Blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                    </a>

                    <p>
                        Consejos para construir una terraza en el techo de tu casa con los mejores materiales ahorrando dinero
                    </p>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Texto entrada Blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                    </a>

                    <p>
                        Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                    </p>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>Excelente atención por parte de los profesionales, la casa que me ofrecieron cumple mis expectativas</blockquote>
                <p>- Mariano Rosales</p>
            </div>
        </section>
    </div>