<?php
/* Smarty version 5.3.1, created on 2024-11-05 11:51:32
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_6729f8b4386938_57121381',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f0faf6654b570b6a80ae045ec1eed285a81cd92' => 
    array (
      0 => 'home.tpl',
      1 => 1729603233,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6729f8b4386938_57121381 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5938828036729f8b43813c4_33294188', "content");
?>



<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_5938828036729f8b43813c4_33294188 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>

    <h1>Welkom op Park Reviews & CO!</h1>
    <?php if ($_smarty_tpl->getValue('isLoggedIn')) {?>
        <p>Welkom, <?php echo $_smarty_tpl->getValue('username');?>
!</p>
    <?php }?>


    <br>
    <div class="card" style="width: 60%;">
        <div class="card-body">
            <h5 class="card-title d-flex justify-content-center">Introductie</h5>
            <p class="card-text d-flex justify-content-center">Welkom bij Park Reviews & CO! Wij proberen de meest accurate reviews over uw favoriete parken in Nederland te lezen! Onze professionals schrijven de meest gedetailleerde reviews gebasseerd op verschillende factoren, zoals attracties, achtbanen, atmosfeer, thematisering en meer! Onze website is de beste source van kennis en reviews over pretparken in ons land!</p>
            <a href="./index.php?action=showParks" class="btn btn-primary d-flex justify-content-center">Bekijk hier onze reviews!</a>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
