{include file="header.tpl"}
{foreach from=$detail item=$item}
<div class="card">
    <div>
        <img src="{$item->img}" alt="{$item->name}" class="imgDetail">
        
    </div>
    <div class="card-body">
        <h5 class="card-title">{$item->name}</h5>
        <p class="card-text">Nacionalidad: {$item->nationality}</p>
        <p class="card-text">Año de Nacimiento: {$item->birthdate}</p>
        <a href="book" class="btn btn-primary">Volver</a>
    </div>
</div>
{/foreach}
{include file="footer.tpl"}


