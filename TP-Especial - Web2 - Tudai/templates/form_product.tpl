<!-- formulario de alta de productos -->

<div><h3>Formulario de Alta de Productos</h3></div>
<form action="insertProduct" method="POST" class="my-4">
{*comentarios en tpl*}
    <div class="form-group">
        <input type="hidden" name="id_product" value="1">
        <label>Producto</label>
        <input name= "name_product" id="name_product" type="text" class="form-control"/>
        <label>Tamaño</label>
        <input name="size" id="size" type="text" class="form-control"/>
        <label>Color</label>
        <input name="color" id="color" type="text" class="form-control"/>
        <label>Precio</label>
        <input name="price" id="price" type="text" class="form-control"/>
    </div>        
    <div class="form-group">
        <label>Categoría</label>
            <select name="id_categorie_fk" id="id_categorie_fk" class="form-control">
            <option> -- Seleccione -- </option>
            <option value = "1">Pinturas</option>
            <option value = "2">Preparación</option>
            <option value = "3">Protección</option>
            </select>
    </div>
    
    <button type="submit" class="btn btn-success">Agregar</button>
    
</form>
