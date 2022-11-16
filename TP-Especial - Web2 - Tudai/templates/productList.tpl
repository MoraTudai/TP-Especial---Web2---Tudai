{include file="header.tpl"}

<!-- lista de productos -->
<h3>Productos</h3>
<table class="table table-striped">
    <thead>
        <th>Nombre</th>
        <th>Tamaño</th>
        <th>Color</th>
        <th>Precio</th>
        <th>Categoría</th>
        {*<th>Descripción</th>*}
    </thead>     
       
    {foreach from=$productos item=$producto}
        <tr>   
            <input type="hidden" name="id" value="{$id_product}"> 
            {*<td> {$producto->name_product|truncate:25} </td>*}
            <td><a href='showByProduct/{$producto->id_product}' type="submit" class="btn btn-light">{$producto->name_product|truncate:25}</a></td>
            <td> {$producto->size|truncate:25} </td>
            <td> {$producto->color|truncate:25} </td>
            <td> {$producto->price|truncate:25} </td>
            <td> {$producto->categoria|truncate:25} </td>
            {*<td> {$producto->description|truncate:25} </td>*}

            {if isset($smarty.session.USER_ID)}
                <td><a href='showEdit/{$producto->id_product}' type="submit" class="btn btn-warning">Modificar</a></td>
                <td><a href='deleteProduct/{$producto->id_product}' type="submit" class="btn btn-danger">Eliminar</a></td>   
            {/if}    
        </tr>
    {/foreach}

</table>

<p class="mt-3"><small>Mostrando {$count} productos</small></p>

{if isset($smarty.session.USER_ID)}
    {include file="form_product.tpl"}
{/if}


{include file="footer.tpl"}