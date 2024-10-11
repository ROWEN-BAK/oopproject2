<?php
/* Smarty version 5.3.1, created on 2024-10-11 23:33:22
  from 'file:showpark.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_670999a2bdb682_85891117',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0e91ed41a95b0c338521e0c4884f50c6d16e51d' => 
    array (
      0 => 'showpark.tpl',
      1 => 1728642873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_670999a2bdb682_85891117 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1203534127670999a2bd3107_93799872', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1203534127670999a2bd3107_93799872 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>

    <h1>Selecteer een park om de reviews te bekijken</h1>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('parks'), 'park');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('park')->value) {
$foreach0DoElse = false;
?>
        <div class="card" style="width: 50%">
            <div class="card-body">
                <h5 class="card-title"><?php echo $_smarty_tpl->getValue('park')->name;?>
</h5>
                <p class="card-text"><?php echo $_smarty_tpl->getValue('park')->description;?>
</p>
                <a href="./index.php?action=parkreviews&park=<?php echo $_smarty_tpl->getValue('park')->name;?>
" class="btn btn-primary">
                    Bekijk hier de reviews voor <?php echo $_smarty_tpl->getValue('park')->name;?>
!
                </a>
            </div>
        </div>
        <br>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
/* {/block "content"} */
}
