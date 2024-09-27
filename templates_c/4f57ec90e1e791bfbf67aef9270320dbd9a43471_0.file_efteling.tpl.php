<?php
/* Smarty version 5.3.1, created on 2024-09-23 12:47:59
  from 'file:efteling.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66f1475f890649_63946401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f57ec90e1e791bfbf67aef9270320dbd9a43471' => 
    array (
      0 => 'efteling.tpl',
      1 => 1726746905,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66f1475f890649_63946401 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_156890475566f1475f889dc6_38522566', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_156890475566f1475f889dc6_38522566 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>

    <h1>Reviews van de Efteling</h1>
    <br>
    <p>Op deze pagina staan reviews voor de Efteling, deze reviews zijn door onze professionals geschreven. Deze reviews zijn zo gedetaileerd mogelijk geschreven.</p>
    <div class="card" style="width: 45%">
        <div style="width: 95%">
            <?php echo $_smarty_tpl->getValue('park1')->getReview();?>

        </div>
    </div>
    <br>
    <div class="card" style="width: 45%">
        <div style="width: 95%">
            <?php echo $_smarty_tpl->getValue('park2')->getReview();?>

        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
