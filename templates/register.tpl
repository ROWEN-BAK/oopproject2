{extends file="layout.tpl"}
{block name="content"}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Registreren</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?action=register">
                            <div class="form-group mb-4">
                                <label for="username">Gebruikersnaam</label>
                                <input type="text" class="form-control" name="username" id="username" required maxlength="100" placeholder="Voer je gebruikersnaam hier in.">
                            </div>
                            <div class="form-group mb-4">
                                <label for="email">Email Adres</label>
                                <input type="email" class="form-control" name="email" id="email" required maxlength="100" placeholder="Voer je email hier in.">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Wachtwoord</label>
                                <input type="password" class="form-control" name="password" id="password" required maxlength="500" placeholder="Voer je wachtwoord in.">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registreren</button>
                            {if isset($error)}
                                <div class="alert alert-danger mt-3" role="alert">
                                    {$error}
                                </div>
                            {/if}
                            <div class="mt-3 text-center">
                                <p>Heb je al een account? <a href="index.php?action=login">Inloggen</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{/block}