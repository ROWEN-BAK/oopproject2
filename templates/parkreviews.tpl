{extends file="layout.tpl"}
{block name="content"}
    <h1>Reviews voor {$park->name}</h1>
    {foreach from=$reviews item=review}
        <div class="card" style="width: 50%">
            <div class="card-body">
                <h5 class="card-title">{$review->rating}/5</h5>
                <p class="card-text">{$review->description}</p>
            </div>
        </div>
        <br>
    {/foreach}
    <a href="./index.php?action=showParks" class="btn btn-primary">Klik hier om terug te gaan naar de lijst met parken!</a>
{/block}
