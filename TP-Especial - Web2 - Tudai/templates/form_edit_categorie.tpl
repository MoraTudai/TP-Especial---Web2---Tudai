<!-- formulario de modificación de categorías -->

<div><h3>Formulario de Modificación de Categorías</h3></div>
<form action="editCategorie" method="POST" class="my-4">
    
{*comentarios en tpl*}
    <div class="form-group">
        <input type="hidden" name="id" value="{$id_categorie}">  
        <label>Categoría</label>
        <input name="nombre" id="nombre" type="text" class="form-control"/>
    </div>
   
    <button type="submit" class="btn btn-success">Modificar</button>
   
</form>

{include file='footer.tpl'}