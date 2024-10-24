<?php
/* Smarty version 5.3.1, created on 2024-10-24 16:06:43
  from 'file:userreviews.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_671a5473378417_07512892',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82dae7e8bdd0420a1a2969959d95272b5736333c' => 
    array (
      0 => 'userreviews.tpl',
      1 => 1729778750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_671a5473378417_07512892 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>
 

    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_627638975671a547336b2f7_60185342', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_627638975671a547336b2f7_60185342 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>

        <h1>Gebruikersreviews</h1>
        <br>
        <?php if ($_smarty_tpl->getValue('isLoggedIn')) {?>
            <h2>Schrijf een recensie</h2>
            <form action="index.php?action=submitReview" method="post">
                <div class="mb-3">
                    <input type="hidden" name="user" value="<?php echo $_smarty_tpl->getValue('user')['username'];?>
">
                </div>
                <div class="mb-3">
                    <label for="parkname" class="form-label">Parknaam</label>
                    <select id="parkname" name="parkname" class="form-select" required>
                        <option value="">Selecteer een park</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('userparks'), 'park');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('park')->value) {
$foreach0DoElse = false;
?>
                            <option value="<?php echo $_smarty_tpl->getValue('park')['name'];?>
"><?php echo $_smarty_tpl->getValue('park')['name'];?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
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
        <?php }?>
        <br>
        <?php if ($_smarty_tpl->getValue('userreviews')) {?>
            <ul>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('userreviews'), 'review');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('review')->value) {
$foreach1DoElse = false;
?>
                    <div class="card" style="width: 50%">
                        <div class="card-body">
                            <h2 class="card-title">Gebruiker: <?php echo $_smarty_tpl->getValue('review')->user;?>
</h2>
                            <p class="card-text">Park: <?php echo $_smarty_tpl->getValue('review')->parkname;?>
</p>
                            <p class="card-text">Beoordeling: <?php echo $_smarty_tpl->getValue('review')->rating;?>
/5</p>
                            <p class="card-text">"<?php echo $_smarty_tpl->getValue('review')->reviewcontext;?>
"</p>
                        </div>
                    </div>
                    <br>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p>Er zijn nog geen gebruikersreviews toegevoegd.</p>
        <?php }?>

<?php
}
}
/* {/block "content"} */
}
