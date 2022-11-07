{include file="header.tpl"}
<table class="table">
    <thead class="table-dark">
        <h1 class="font-monospace fw-bold display-2 text-center powerTitle">
            {$name->name}</h1>
        <tr>
            <th></th>
            <th>Titulo</th>
            <th>Genero</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$filters item=$filter}
            <tr>
                <td>
                    {if isset($filter->img)}
                        <img src="{$filter->img}" alt="{$filter->title}" class="img-filterView" />
                    {/if}
                </td>
                <td>{$filter->title}</td>
                <td>{$filter->genre}</td>
            </tr>
        {/foreach}
    </tbody>
</table>
{include file="footer.tpl"}