{include file="header.tpl"}

<h3>Categoria a modificar</h3>
<table class="table table-striped">
    <thead>
        <th>Categoría</th>
    </thead>     
  
    <tbody>
        {foreach from=$categoriaAModificar item=$catAModificar}
            <tr>
                <td> {$catAModificar->nombre|truncate:25} </td>
            </tr>
        {/foreach}
    </tbody>
</table>

<p class="mt-3"><small>Usted está por modificar el siguiente producto: {$catAModificar->nombre}</small></p>
