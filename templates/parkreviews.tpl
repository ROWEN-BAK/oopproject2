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

    <h2>Voeg jouw review toe!</h2>
    <p>P.S. Hou alstublieft uw reviews netjes.</p>
    <form action="./index.php?action=parkreviews&park={$park->name}" method="POST">
        <input type="hidden" name="park" value="{$park->name}"> <!-- Verborgen input om automatisch de parknaam te assignen -->
        <div class="mb-3">
            <label for="rating" class="form-label">Beoordeling (1-5)</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Beschrijving</label>
            <input class="form-control" id="description" name="description" required></input>
        </div>
        <button type="submit" name="submit_form" class="btn btn-primary">Verzend Review</button>
    </form>


{/block}
