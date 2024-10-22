<?php
/* Smarty version 5.3.1, created on 2024-10-22 15:21:23
  from 'file:userreviews.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_6717a6d3391466_17414079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82dae7e8bdd0420a1a2969959d95272b5736333c' => 
    array (
      0 => 'userreviews.tpl',
      1 => 1728551291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6717a6d3391466_17414079 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1870779346717a6d338eb58_49984611', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'layout.tpl', $_smarty_current_dir);
}
/* {block "content"} */
class Block_1870779346717a6d338eb58_49984611 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>

    <!--(Nog) niet gemaakte userreview pagina, moet nog een login maken voor het db gedeelte van het proj-->
<h1>User Reviews</h1>
    <br>
    <p>Hier kunt u uw eigen reviews maken over een pretpark uit uw regio die niet standaard op onze website staat, of reviews van andere mensen hier zien en lezen. We vragen u wel om alleen serieuze reviews te plaatsen, probeer het zo gedetaileerd mogelijk te maken. Alle meningen zijn geaccepteerd op onze website! </p>
<?php
}
}
/* {/block "content"} */
}
