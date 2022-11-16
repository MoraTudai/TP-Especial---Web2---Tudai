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
        <td><a href='showByCategorie/{$categoria->id_categorie}' type="submit" class="btn btn-light"><span> <b>{$categoria->nombre|truncate:25}</b> </span></a></td>
        {if isset($smarty.session.USER_ID)}
            <td><a href='showEditCategorie/{$categoria->id_categorie}' type="submit" class="btn btn-warning">Modificar</a></td>
            <td><a href='deleteCategorie/{$categoria->id_categorie}' type="submit" class="btn btn-danger">Eliminar</a></td>
        {/if}  
    </tr>
    {/foreach}

</table>

<p class="mt-3"><small>Mostrando {$count} categorias</small></p>

{include file="form_alta_categorie.tpl"}
{include file="footer.tpl"}