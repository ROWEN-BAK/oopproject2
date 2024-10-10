<?php
/* Smarty version 5.3.1, created on 2024-10-10 12:47:25
  from 'file:parkreviews.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_6707b0bdc3e222_00880362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be5962bde66227e2e9bcbd61fbdd9ebf834f2932' => 
    array (
      0 => 'parkreviews.tpl',
      1 => 1728554391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6707b0bdc3e222_00880362 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19832114676707b0bdc35e46_43170927', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_19832114676707b0bdc35e46_43170927 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>

    <!-- Reviews foreach -->
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

    <!-- Review user input form -->
    <h2>Voeg jouw review toe!</h2>
    <p>P.S. Hou alstublieft uw reviews netjes. Wij willen niet dat er onnodige en onzinnige rare reviews op onze website komen te staan.</p>
    <form action="./index.php?action=parkreviews&park=<?php echo $_smarty_tpl->getValue('park')->name;?>
" method="POST">
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
<br>
    <a href="./index.php?action=showParks" class="btn btn-primary">Klik hier om weer terug te gaan naar de lijst met parken!</a>
<?php
}
}
/* {/block "content"} */
}
