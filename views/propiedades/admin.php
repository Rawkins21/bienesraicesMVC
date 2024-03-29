<main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
    
    <?php
            if($resultado){
            $mensaje = mostrarNotificacion(intval($resultado)); // intval convierte el string en un entero (el string de la url en un entero)
            if($mensaje) { ?>
               <p class="alerta exito"><?php echo sanitizar($mensaje) ?></p>
               <?php } 
        }
    ?>
           
        
        <a href="/public/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/public/vendedores/crear" class="boton boton-verde">Nuevo Vendedor/a</a>


        <h2>Propiedades</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
         </thead>


            <tbody class="admin"> <!-- mostrar los resultados -->
                <?php foreach( $propiedades as $propiedad ):?> 
                <tr>
                    <td><?php echo $propiedad->id; ?> </td>
                    <td><?php echo $propiedad->titulo; ?> </td>
                    <td><img src="/public/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action='/public/propiedades/eliminar'>
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">

                        </form>
                        <a href="/public/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                  
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>

        
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                                
                </tr>
        </thead>


            <tbody class="admin"> <!-- mostrar los resultados -->
                <?php foreach( $vendedores as $vendedor ):?> 
                <tr>
                    <td><?php echo $vendedor->id; ?> </td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                    <td><?php echo $vendedor->telefono; ?> </td>
                    <td><?php echo $vendedor->email; ?> </td>
                    <td><img src="/public/imagenes/<?php echo $vendedor->imagen; ?>" class="imagen-tabla"></td>



                    <td>
                        <form method="POST" class="w-100" action="../public/vendedores/eliminar">

                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="../public/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

</main>