{include file="header.tpl"}

<h3>Producto a modificar</h3>
<table class="table table-striped">
    <thead>
        <th>Categoría</th>
        <th>Producto</th>
        <th>Tamaño</th>
        <th>Color</th>
        <th>Precio</th>
        <th>Descripción</th>
    </thead>     
       
            
    {foreach from=$productoAModificar item=$prodAModificar}
        <tr>
            <td> {$prodAModificar->categoria|truncate:25} </td>
            <td> {$prodAModificar->name_product|truncate:25} </td>
            <td> {$prodAModificar->size|truncate:25} </td>
            <td> {$prodAModificar->color|truncate:25} </td>
            <td> {$prodAModificar->price|truncate:25} </td>        
            <td> {$prodAModificar->description|truncate:25} </td> 
            
        </tr>
    {/foreach}

</table>
<p class="mt-3"><small>Usted está por modificar el siguiente producto: {$prodAModificar->name_product}</small></p>