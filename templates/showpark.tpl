{extends file="layout.tpl"}
{block name="content"}
    <!--Foreach om de array met parken te laten tonen-->
    <h1>Selecteer een park om de reviews te bekijken</h1>
    {foreach from=$parks item=park}
        <div class="card" style="width: 50%">
            <div class="card-body">
                <h5 class="card-title">{$park->name}</h5>
                <p class="card-text">{$park->description}</p>
                <!--Met de knop hieronder word je naar de parkreviews pagina genomen, met een filter die alleen de reviews voor het aangeklikte park laat zien-->
                <a href="./index.php?action=parkreviews&park={$park->name}" class="btn btn-primary">
                    Bekijk hier de reviews voor {$park->name}!
                </a>
            </div>
        </div>
        <br>
    {/foreach}
{/block}
