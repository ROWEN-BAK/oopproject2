<?php
/* Smarty version 5.3.1, created on 2024-11-05 11:28:42
  from 'file:profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_6729f35aef4ed2_67868611',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bc5c7bb2bafe2640559d95ad6460f4f85a6525a' => 
    array (
      0 => 'profile.tpl',
      1 => 1730802514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6729f35aef4ed2_67868611 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8518914906729f35aee4d94_02598865', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_8518914906729f35aee4d94_02598865 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>

    <div class="container">
        <h1>Profiel van <?php echo $_smarty_tpl->getValue('userDetails')['username'];?>
</h1>
        <p><strong>Email:</strong> <?php echo $_smarty_tpl->getValue('userDetails')['email'];?>
</p>
        <p><strong>Gebruikersnaam:</strong> <?php echo $_smarty_tpl->getValue('userDetails')['username'];?>
</p>

        <h2>Jouw reviews</h2>
        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('userReviews')) > 0) {?>
            <ul class="list-group">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('userReviews'), 'review');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('review')->value) {
$foreach0DoElse = false;
?>
                    <li class="list-group-item">
                        <h5><?php echo $_smarty_tpl->getValue('review')['parkname'];?>
 - Beoordeling: <?php echo $_smarty_tpl->getValue('review')['rating'];?>
</h5>
                        <p>"<?php echo $_smarty_tpl->getValue('review')['reviewcontext'];?>
"</p>
                        <a href="./index.php?action=profile&deletePost=<?php echo $_smarty_tpl->getValue('review')['id'];?>
" class="btn btn-danger">Verwijder Review</a>
                    </li>
                    <br>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        <?php } else { ?>
            <p>Je hebt nog geen reviews geplaatst.</p>
        <?php }?>

        <h2>Wachtwoord veranderen</h2>
        <?php if ((null !== ($_smarty_tpl->getValue('message') ?? null))) {?>
            <div class="alert alert-success"><?php echo $_smarty_tpl->getValue('message');?>
</div>
        <?php }?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="newPassword" class="form-label">Nieuw Wachtwoord</label>
                <input type="password" class="form-control" name="newPassword" id="newPassword" required maxlength="500">
            </div>
            <button type="submit" name="changePassword" class="btn btn-primary">Verander Wachtwoord</button>
        </form>
    </div>
<?php
}
}
/* {/block "content"} */
}
