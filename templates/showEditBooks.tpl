{include file="header.tpl"}

<!-- lista de tareas -->
<table class="table table-hover">

    <thead>
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Genero</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$books item=$book}
            <tr>
                <td>{$book->title}</td>
                <td>{$book->genre}</td>
                <td><a href='deleteBook/{$book->id}' type='button' class='btn btn-danger'>Borrar</a></td>
                <td><a href='showEdit/{$book->id}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>

<h1>Editar Libro</h1>

<form action="editBook/{$book->id}" method="POST" class="my-4">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Seleccione una opcion</label>
        <select name="id_author" class="form-control">
            {foreach from =$authors item=$item}
                <option value="{$item->id_author}">{$item->name}</option>
            {/foreach}
        </select>
    </div>
        {foreach from=$books item=$book}   
    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
<input type="text" class="form-control" name="titulo" value="{$book->title}">
    </div>
    <div class="mb-3">
        <label for="genero" class="form-label">Genero</label>
<input type="text" class="form-control" name="genero" value="{$book->genre}">
    </div>
        {/foreach}
    <button type="submit" class="btn btn-primary mt-2">Editar</button>
</form>
{include file="footer.tpl"}
