<?php
/* Smarty version 5.3.1, created on 2024-10-11 13:24:10
  from 'file:parkreviews.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_67090ada70d047_37426268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be5962bde66227e2e9bcbd61fbdd9ebf834f2932' => 
    array (
      0 => 'parkreviews.tpl',
      1 => 1728644439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67090ada70d047_37426268 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_158806247267090ada703c37_69767009', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_158806247267090ada703c37_69767009 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>

    <h1>Reviews voor <?php echo $_smarty_tpl->getValue('park')->name;?>
</h1>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('reviews'), 'review');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('review')->value) {
$foreach0DoElse = false;
?>
        <div class="card" style="width: 50%">
            <div class="card-body">
                <h5 class="card-title"><?php echo $_smarty_tpl->getValue('review')->rating;?>
/5</h5>
                <p class="card-text"><?php echo $_smarty_tpl->getValue('review')->description;?>
</p>
            </div>
        </div>
        <br>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

    <h2>Voeg jouw review toe!</h2>
    <p>P.S. Hou alstublieft uw reviews netjes.</p>
    <form action="./index.php?action=parkreviews&park=<?php echo $_smarty_tpl->getValue('park')->name;?>
" method="POST">
        <input type="hidden" name="park" value="<?php echo $_smarty_tpl->getValue('park')->name;?>
"> <!-- Verborgen input -->
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


<?php
}
}
/* {/block "content"} */
}
