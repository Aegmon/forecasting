<?php
/* Smarty version 3.1.39, created on 2024-10-25 07:10:58
  from '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/sections/footer_client_default.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_671ad402d2b4e7_63522181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdd09249f37ae8f2a871dd6be572581580830917' => 
    array (
      0 => '/home/u545031325/domains/financialforcast.online/public_html/ui/theme/ibilling/sections/footer_client_default.tpl',
      1 => 1729647785,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_671ad402d2b4e7_63522181 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax-modal" class="modal container fade" tabindex="-1" style="display: none;"></div>
</div>

<?php if ($_smarty_tpl->tpl_vars['tpl_footer']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_footer']) {?>

    <?php } else { ?>
        <div class="footer">
            <div>
                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Copyright'];?>
</strong> &copy; <?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>

            </div>
        </div>
    <?php }
}?>

</div>
</div>
</section>
<!-- BEGIN PRELOADER -->
<?php if (($_smarty_tpl->tpl_vars['_c']->value['animate']) == '1') {?>
    <div class="loader-overlay">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
<?php }?>
<input type="hidden" id="_url" name="_url" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
">
<input type="hidden" id="_df" name="_df" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['df'];?>
">
<input type="hidden" id="_lan" name="_lan" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['language'];?>
">
<!-- END PRELOADER -->
<!-- Mainly scripts -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-ui-1.10.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var _L = [];
    var config_animate = 'No';
    <?php if (($_smarty_tpl->tpl_vars['_c']->value['animate']) == '1') {?>
    var config_animate = 'Yes';
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['jsvar']->value;?>

<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery.metisMenu.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<!-- Custom and plugin javascript -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/moment.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/lib/blockui.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/lib/toggle/bootstrap-toggle.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/lib/numeric.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/lib/app.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/theme.js"><?php echo '</script'; ?>
>

<?php if (($_smarty_tpl->tpl_vars['_c']->value['animate']) == '1') {?>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/pace.min.js"><?php echo '</script'; ?>
>
<?php }
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/progress.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/bootbox.min.js"><?php echo '</script'; ?>
>

<!-- iCheck -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/icheck/icheck.min.js"><?php echo '</script'; ?>
>
<?php if ((isset($_smarty_tpl->tpl_vars['xfooter']->value))) {?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }
echo '<script'; ?>
>
    jQuery(document).ready(function() {
        // initiate layout and plugins

        matForms();

        <?php if ((isset($_smarty_tpl->tpl_vars['xjq']->value))) {?>
        <?php echo $_smarty_tpl->tpl_vars['xjq']->value;?>

        <?php }?>

    });

<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->tpl_vars['_c']->value['footer_scripts'];?>

</body>

</html>
<?php }
}
