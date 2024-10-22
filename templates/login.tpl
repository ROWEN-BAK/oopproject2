{extends file="layout.tpl"}
{block name="content"}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Inloggen</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?action=login">
                            <div class="form-group">
                                <label for="username">Gebruikersnaam</label>
                                <input type="text" class="form-control" name="username" id="username" required placeholder="Voer je gebruikersnaam hier in.">
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Wachtwoord</label>
                                <input type="password" class="form-control" name="password" id="password" required placeholder="Voer je wachtwoord in.">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">Inloggen</button>
                            {if isset($loginError)}
                                <div class="alert alert-danger mt-3" role="alert">
                                    {$loginError}
                                </div>
                            {/if}
                            <div class="mt-3">
                                <p>Heb je nog geen account? Klik dan <a href="index.php?action=register">hier</a> om je te registreren!</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{/block}
