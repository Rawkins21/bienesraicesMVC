<fieldset>
                <legend>información Principal</legend>


                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre de Vendedor/a" value="<?php echo sanitizar ($vendedor->nombre); ?>">

                
                <label for="apellido">Apellido:</label>
                <input type="text" id="nombre" name="vendedor[apellido]" placeholder="Apellido de Vendedor/a" value="<?php echo sanitizar ($vendedor->apellido); ?>">

            </fieldset>
            
 <fieldset>


                <legend>información Extra</legend>

                
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono de Vendedor/a" value="<?php echo sanitizar ($vendedor->telefono); ?>">

                <label for="email">Email:</label>
                <input type="text" id="email" name="vendedor[email]" placeholder="Email de Vendedor/a" value="<?php echo sanitizar ($vendedor->email); ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="vendedor[imagen]"> <!--//accept especifica los formatos que puede aceptar -->

                <?php if($vendedor->imagen){ ?>
                     <img src="/public/imagenes/<?php echo$vendedor->imagen; ?>" class="imagen-small">

                <?php } ?>

                
    </fieldset>