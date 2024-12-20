<?php
/* Smarty version 5.3.1, created on 2024-11-07 12:02:36
  from 'file:layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_672c9e4c387007_86760684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a8e5bd4cd7af86042b1a432a36fe55fb115f55c' => 
    array (
      0 => 'layout.tpl',
      1 => 1729855670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_672c9e4c387007_86760684 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Park Reviews & CO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">RD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=showParks">Parken</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=userreviews">User Reviews</a>
                </li>
                <?php if ($_smarty_tpl->getValue('isLoggedIn')) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=profile">Profiel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=logout">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=loginForm">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=register">Registreren</a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>

<br>
<div class="container">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_203123537672c9e4c386753_24481660', "content");
?>

</div>
<br>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
/* {block "content"} */
class Block_203123537672c9e4c386753_24481660 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\oopproject2\\templates';
?>


    <?php
}
}
/* {/block "content"} */
}
