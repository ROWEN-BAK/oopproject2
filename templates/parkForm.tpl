{extends file="layout.tpl"}

{block name="content"}
    <h1>Voeg een nieuw park toe</h1>

    {if isset($formError)}
        <div class="alert alert-danger">{$formError}</div>
    {/if}

    <form action="index.php?action=submitPark" method="post">
        <div class="mb-3">
            <label for="parkName" class="form-label">Parknaam</label>
            <input type="text" class="form-control" id="parkName" name="parkName" required>
        </div>
        <button type="submit" class="btn btn-primary">Park toevoegen</button>
        {if isset($error)}
            <div class="alert alert-danger mt-3" role="alert">
                {$error}
            </div>
        {/if}
    </form>
{/block}
