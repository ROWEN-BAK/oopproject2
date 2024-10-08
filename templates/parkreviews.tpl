{extends file="layout.tpl"}
{block name="content"}
    <!--Reviews worden hier met een foreach op het scherm getoond, Reviews zijn wel gefiltered op het park. Code is bijna hetzelfde als de showparks foreach-->
    <h1>Reviews voor {$park->name}</h1>
    <p>Hier komen reviews te staan voor {$park->name} die door onze Park-Proffesionals zijn geschreven en gepubliceerd. Deze reviews zijn zeer accuraat en met deze reviews kunt u het beste uw bezoek aan {$park->name} voorspellen!</p>
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
