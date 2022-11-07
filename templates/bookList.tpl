{include file="header.tpl"}

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Genero</th>
            <th scope="col">Autor</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$books item=$book}
            <tr>
                <td><a href="detail/{$book->id_author}" class="text-dark">{$book->title}</a></td>
                <td>{$book->genre}</td>
                <td>{$book->name}</td>
                <td>{if isset($book->imagen)}
                    <img src="{$book->imagen}" alt="{$book->title}" class="imgBookList"/>
                    {/if}
                </td>
                {if isset($smarty.session.USER_ID)}
                <td><a href='showEdit/{$book->id}' type='button' class='btn btn-danger ml-auto'>Editar</a></td>
                <td><a href='deleteBook/{$book->id}' type='button' class='btn btn-danger'>Borrar</a></td>
                {{/if}}
            </tr>
        {/foreach}
    </tbody>
</table>

{if isset($smarty.session.USER_ID)}
{include file="formBook.tpl"}
{{/if}}
{include file="footer.tpl"}








{*
{include file="header.tpl"}

<!-- lista de tareas -->
<ul class="list-group">
    {foreach from=$books item=$book}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> <b>{$book->title}</b> - {$book->genre} - {$book->name}</span>
            <div class="ml-auto">                
                <a href='delete/{$book->id}' type='button' class='btn btn-danger'>Borrar</a>
            </div>
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} Libros</small></p>

{include file="footer.tpl"}
*}