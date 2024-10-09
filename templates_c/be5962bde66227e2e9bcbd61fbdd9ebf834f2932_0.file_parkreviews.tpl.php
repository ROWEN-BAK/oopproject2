<?php
/* Smarty version 5.3.1, created on 2024-10-09 14:15:47
  from 'file:parkreviews.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_670673f35d25b7_21200594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be5962bde66227e2e9bcbd61fbdd9ebf834f2932' => 
    array (
      0 => 'parkreviews.tpl',
      1 => 1728385801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_670673f35d25b7_21200594 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1014063266670673f35bfe79_07827099', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1014063266670673f35bfe79_07827099 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>

    <!--Reviews worden hier met een foreach op het scherm getoond, Reviews zijn wel gefiltered op het park. Code is bijna hetzelfde als de showparks foreach-->
    <h1>Reviews voor <?php echo $_smarty_tpl->getValue('park')->name;?>
</h1>
    <p>Hier komen reviews te staan voor <?php echo $_smarty_tpl->getValue('park')->name;?>
 die door onze Park-Proffesionals zijn geschreven en gepubliceerd. Deze reviews zijn zeer accuraat en met deze reviews kunt u het beste uw bezoek aan <?php echo $_smarty_tpl->getValue('park')->name;?>
 voorspellen!</p>
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
    <a href="./index.php?action=showParks" class="btn btn-primary">Klik hier om terug te gaan naar de lijst met parken!</a>
<?php
}
}
/* {/block "content"} */
}
