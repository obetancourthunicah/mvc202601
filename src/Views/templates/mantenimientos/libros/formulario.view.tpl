<h1>Formulario de Libros</h1>
<section class="grid row">
    <form class="depth-0 offset-3 col-6" action="index.php?page=Mantenimientos_Libros_Formulario" method="POST" >
        <div class="row align-center">
            <div class="col-4">
                <label for="id">Código</label>
            </div>
            <div class="col-8">
                <input type="text" value="{{id}}" disabled  name="id" id="id"/>
            </div>
        </div>
         <div class="row align-center">
            <div class="col-4">
                <label for="titulo">Título</label>
            </div>
            <div class="col-8">
                <input type="text" name="titulo" id="titulo" value="{{titulo}}" placeholder="Título del Libro" />
            </div>
        </div>
        <div class="row align-start">
            <div class="col-4">
                <label for="resumen">Resumen</label>
            </div>
            <div class="col-8">
                <textarea id="resumen" name="resumen" placeholder="Resumen del Libro" cols="40" rows="8">{{resumen}}</textarea>
            </div>
        </div>
         <div class="row align-center">
            <div class="col-4">
                <label for="autor">Autor</label>
            </div>
            <div class="col-8">
                <input type="text" name="autor" id="autor" value="{{autor}}" placeholder="Autor del Libro" />
            </div>
        </div>
         <div class="row align-center">
            <div class="col-4">
                <label for="fecha_publicacion">Fecha Publicación</label>
            </div>
            <div class="col-8">
                <input type="text" name="fecha_publicacion" id="fecha_publicacion" value="{{fecha_publicacion}}" placeholder="Publicado en" />
            </div>
        </div>
        <div class="row align-center">
            <div class="col-4">
                <label for="genero">Género</label>
            </div>
            <div class="col-8">
                <input type="text" name="genero" id="genero" value="{{genero}}" placeholder="Generó Literario del Libro" />
            </div>
        </div>
        <div class="row align-center">
            <div class="col-4">
                <label for="precio">Precio</label>
            </div>
            <div class="col-8">
                <input type="text" name="precio" id="precio" value="{{precio}}" placeholder="Precio del Libro" />
            </div>
        </div>
        <div class="right">
            <button type="submit" name="btnEnviar">Confirmar</button>
            &nbsp;
            <button id="cancelar">Cancelar</button>
        </div>
    </form>
</section>