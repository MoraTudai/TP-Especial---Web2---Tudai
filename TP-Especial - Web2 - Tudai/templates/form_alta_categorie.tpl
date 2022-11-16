<!-- formulario de alta de categorias -->

<div><h3>Formulario de Alta de Categorías</h3></div>
<form action="insertCategorie" method="POST" class="my-4">
    
{*comentarios en tpl*}
    <div class="form-group">
        <input type="hidden" name="id_categorie" value="1">
        <label>Categoría</label>
        <input name="nombre" id="nombre" type="text" class="form-control"/>
    </div>        
   
    <button type="submit" class="btn btn-success">Agregar</button>
   
</form>

