{include file="header.tpl"}

<!-- tabla de categorias -->
<h3>Categorías</h3>
<table class="table table-striped">
    <thead>
        <th>Categorías</th>
    </thead>     

    {foreach from=$categorias item=$categoria}
    <tr>
        <input type="hidden" name="id" value="{$id_categorie}">
        <td> <span> <b>{$categoria->nombre|truncate:25}</b> </span> </td>
        <td><a href='showEditCategorie/{$categoria->id_categorie}' type="submit" class="btn btn-warning">Modificar</a></td>
        <td><a href='deleteCategorie/{$categoria->id_categorie}' type="submit" class="btn btn-danger">Eliminar</a></td>
    </tr>
    {/foreach}

</table>

<p class="mt-3"><small>Mostrando {$count} categorias</small></p>

{include file="form_alta_categorie.tpl"}
{include file="footer.tpl"}