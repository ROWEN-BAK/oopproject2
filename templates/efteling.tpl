{extends file="layout.tpl"}
{block name="content"}
    <h1>Reviews van de Efteling</h1>
    <br>
    <p>Op deze pagina staan reviews voor de Efteling, deze reviews zijn door onze professionals geschreven. Deze reviews zijn zo gedetaileerd mogelijk geschreven.</p>
    <div class="card" style="width: 45%">
        <div style="width: 95%">
            {$park1->getReview()}
        </div>
    </div>
    <br>
    <div class="card" style="width: 45%">
        <div style="width: 95%">
            {$park2->getReview()}
        </div>
    </div>
{/block}