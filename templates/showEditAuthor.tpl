{include file="header.tpl"}
<table class="table table-hover">

    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Nacionalidad</th>
            <th scope="col">Año de Nacimiento</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$authors item=$author}
            <tr>
                <td>{$author->name}</td>
                <td>{$author->nationality}</td>
                <td>{$author->birthdate}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

<h1>Editar Autor</h1>
<form action="editAuthor/{$author->id_author}" method="POST" class="my-4">
    {foreach from=$authors item=$author }
        <div class="mb-3">
            <label for="beer_name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" value="{$author->name}">
        </div>
        <div class="mb-3">
            <label for="abv" class="form-label">Nacionalidad</label>
            <input type="text" class="form-control" name="nationality" value="{$author->nationality}">
        </div>
        <div class="mb-3">
            <label for="ibu" class="form-label">Año de Nacimiento</label>
            <input type="text" class="form-control" name="birthdate" value="{$author->birthdate}">
        </div>
    {/foreach}
    <button type="submit" class="btn btn-primary mt-2">Editar</button>
</form>
{include file="footer.tpl"}