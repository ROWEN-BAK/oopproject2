{extends file="layout.tpl"}

{block name="content"}
    <div class="container">
        <h1>Profiel van {$userDetails.username}</h1>
        <p><strong>Email:</strong> {$userDetails.email}</p>
        <p><strong>Gebruikersnaam:</strong> {$userDetails.username}</p>

        <h2>Jouw reviews</h2>
        {if $userReviews|@count > 0}
            <ul class="list-group">
                {foreach from=$userReviews item=review}
                    <li class="list-group-item">
                        <h5>{$review.parkname} - Beoordeling: {$review.rating}</h5>
                        <p>"{$review.reviewcontext}"</p>
                        <a href="./index.php?action=profile&deletePost={$review.id}" class="btn btn-danger">Verwijder Review</a>
                    </li>
                    <br>
                {/foreach}
            </ul>
        {else}
            <p>Je hebt nog geen reviews geplaatst.</p>
        {/if}

        <h2>Wachtwoord veranderen</h2>
        {if isset($message)}
            <div class="alert alert-success">{$message}</div>
        {/if}
        <form method="POST" action="">
            <div class="mb-3">
                <label for="newPassword" class="form-label">Nieuw Wachtwoord</label>
                <input type="password" class="form-control" name="newPassword" id="newPassword" required>
            </div>
            <button type="submit" name="changePassword" class="btn btn-primary">Verander Wachtwoord</button>
        </form>
    </div>
{/block}
