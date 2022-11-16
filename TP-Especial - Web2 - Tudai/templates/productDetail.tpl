{include file="header.tpl"}

{*listado de producto con detalle*}
<h3>Detalle de Producto</h3>
<table class="table table-striped">
    <thead>
        <th>Categoría</th>
        <th>Nombre</th>
        <th>Tamaño</th>
        <th>Color</th>
        <th>Precio</th>
        <th>Descripción</th>
    </thead>    
    {foreach from=$detalleProducto item=$detalleProd}
    <tr>
        <td> {$detalleProd->categoria|truncate:25} </td>
        <td> {$detalleProd->name_product|truncate:25} </td>
        <td> {$detalleProd->size|truncate:25} </td>
        <td> {$detalleProd->color|truncate:25} </td>
        <td> {$detalleProd->price|truncate:25} </td>        
        <td> {$detalleProd->description|truncate:25} </td>
    </tr>
    {/foreach}
</table>

<p class="mt-3"><small>Mostrando {$count} detalle del producto: {$detalleProd->name_product}</small></p>


{include file="footer.tpl"}