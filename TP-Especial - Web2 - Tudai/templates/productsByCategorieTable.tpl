{include file="header.tpl"}

{*listado de productos por categoria*}
<h3>Productos por Categoría</h3>
<table class="table table-striped">
    <thead>
        <th>Categoría</th>
        <th>Nombre</th>
        <th>Tamaño</th>
        <th>Color</th>
        <th>Precio</th>
    </thead>    
    {foreach from=$productosPorCategoria item=$productoCategoria}
    <tr>
        <td> {$productoCategoria->categoria|truncate:25} </td>
        <td> {$productoCategoria->name_product|truncate:25} </td>
        <td> {$productoCategoria->size|truncate:25} </td>
        <td> {$productoCategoria->color|truncate:25} </td>
        <td> {$productoCategoria->price|truncate:25} </span> </td>        
    </tr>
    {/foreach}
</table>

<p class="mt-3"><small>Mostrando {$count} productos con sus categorías</small></p>


{include file="footer.tpl"}