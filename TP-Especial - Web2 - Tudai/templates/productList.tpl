{include file="header.tpl"}

<!-- lista de productos -->
<h3>Productos</h3>
<table class="table table-striped">
    <thead>
        <th>Nombre</th>
        <th>Tamaño</th>
        <th>Color</th>
        <th>Precio</th>
    </thead>     
       
    {foreach from=$productos item=$producto}
        <tr>   
            <input type="hidden" name="id" value="{$id_product}"> 
            <td> {$producto->name_product|truncate:25} </td>
            <td> {$producto->size|truncate:25} </td>
            <td> {$producto->color|truncate:25} </td>
            <td> {$producto->price|truncate:25} </td>
            <td><a href='showEdit/{$producto->id_product}' type="submit" class="btn btn-warning">Modificar</a></td>
            <td><a href='deleteProduct/{$producto->id_product}' type="submit" class="btn btn-danger">Eliminar</a></td>
        </tr>
    {/foreach}

</table>

<p class="mt-3"><small>Mostrando {$count} productos</small></p>

{include file="form_product.tpl"}

{include file="footer.tpl"}