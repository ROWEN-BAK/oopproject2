 {extends file="layout.tpl"}

    {block name="content"}
        <h1>Gebruikersreviews</h1>
        <br>
        {if $isLoggedIn}
            <h2>Schrijf een recensie</h2>
            <form action="index.php?action=submitReview" method="post">
                <div class="mb-3">
                    <input type="hidden" name="user" value="{$user.username}">
                </div>
                <div class="mb-3">
                    <label for="parkname" class="form-label">Parknaam</label>
                    <select id="parkname" name="parkname" class="form-select" required>
                        <option value="">Selecteer een park</option>
                        {foreach from=$userparks item=park}
                            <option value="{$park.name}">{$park.name}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="mt-3">
                    <p>Staat jouw park er nog niet bij? <a href="index.php?action=parkForm">Voeg jouw park hier toe!</a></p>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Beoordeling</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                </div>
                <div class="mb-3">
                    <label for="reviewcontext" class="form-label">Recensie</label>
                    <textarea class="form-control" id="reviewcontext" name="reviewcontext" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Recensie toevoegen</button>
            </form>
        {/if}
        <br>
        {if $userreviews}
            <ul>
                {foreach from=$userreviews item=review}
                    <div class="card" style="width: 50%">
                        <div class="card-body">
                            <h2 class="card-title">Gebruiker: {$review->user}</h2>
                            <h5 class="card-text">Park: {$review->parkname}</h5>
                            <p class="card-text">Beoordeling: {$review->rating}/5</p>
                            <p class="card-text">"{$review->reviewcontext}"</p>
                        </div>
                    </div>
                    <br>
                {/foreach}
            </ul>
        {else}
            <p>Er zijn nog geen gebruikersreviews toegevoegd.</p>
        {/if}

{/block}
