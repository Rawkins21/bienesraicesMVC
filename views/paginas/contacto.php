<main class="contenedor seccion">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="imagen Contacto" loading="lazy">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <form class="formulario" action="/public/contacto" method="POST">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto [nombre]">

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu Email" id="email"name="contacto [email]">

            <label for="telefono">Teléfono</label>
            <input type="tel" placeholder="Tu Telefono" id="telefono"name="contacto [telefono]">

            <label for="mensaje">Nombre</label>
            <textarea name="" id="mensaje" cols="30" rows="0"name="contacto [mensaje]"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre Propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto [tipo]">
                    <option value="" disabled selected>-Seleccione aquí-</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto [precio]">

        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser contactado:</p>
            <div class="forma-contacto">
                <!--en el tipo radio el nombre debe ser identico para evitar solapamiento -->
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto [contacto]">

                <label for="contactar-email">E-mail</label>
                <input name="contacto" type="radio" value="email" id="contactar-email" name="contacto [precio]">
            </div>

            <p>Si eligió teléfono, elija fecha y hora de contacto</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00">
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>