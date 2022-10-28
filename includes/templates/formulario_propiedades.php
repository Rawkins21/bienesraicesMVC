<fieldset>
                <legend>información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Ttiulo de Propiedad" value="<?php echo sanitizar ($propiedad->titulo); ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de Propiedad" value="<?php echo sanitizar ($propiedad->precio); ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]"> <!--//accept especifica los formatos que puede aceptar -->

                <?php if($propiedad->imagen){ ?>
                     <img src="/imagenes/<?php echo$propiedad->imagen; ?>" class="imagen-small">

                <?php } ?>


                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" cols="30" rows="10" name="propiedad[descripcion]"><?php echo sanitizar ($propiedad->descripcion); ?></textarea>

            </fieldset>
        

            <fieldset>
            <legend>informacion de Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php echo sanitizar ($propiedad->habitaciones); ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="propiedad[wc]" value="<?php echo sanitizar ($propiedad->wc); ?>">

            <label for="estacionamiento">Estracionamiento:</label>
            <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" name="propiedad[estacionamiento]" value="<?php echo sanitizar ($propiedad->estacionamiento); ?>">

         </fieldset>

         <fieldset>
            <legend>Vendedor</legend>

            <label for=""></label>
            <select name="propiedad[vendedorid]" id="vendedor">
               <option selected value="">-- Seleccione --</option>
               <?php foreach($vendedores as $vendedor) { ?>
                  <option 
                     <?php echo $propiedad->vendedorid === $vendedor->id ? 'selected' : '' ?> 
                     value="<?php echo sanitizar($vendedor->id); ?>"><?php echo sanitizar($vendedor->nombre); ?> </option>
               <?php } ?>
               
            </select>
         
         </fieldset> 