<?php
/* Smarty version 3.1.39, created on 2025-03-10 18:54:08
  from 'D:\Xampp\htdocs\forecasting\ui\theme\ibilling\reports-income-vs-expense.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_67cec4d08f4b21_07982154',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7529f26b6b96089af1ea816e8d44e11f61af8d2' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\reports-income-vs-expense.tpl',
      1 => 1733131565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67cec4d08f4b21_07982154 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_209353540267cec4d08ebd26_18031744', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_209353540267cec4d08ebd26_18031744 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_209353540267cec4d08ebd26_18031744',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reports Income Vs Expense'];?>
 </h5>

                </div>
                <div class="ibox-content">


                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Vs Expense'];?>
</h4>
                    <hr>
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Income'];?>
: <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['ai']->value,2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h5>
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Expense'];?>
: <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['ae']->value,2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h5>
                    <hr>
                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Income minus Expense'];?>
 = <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['aime']->value,2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>

                    <hr>
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Income This Month'];?>
: <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['mi']->value,2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h5>
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Expense This Month'];?>
: <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['me']->value,2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h5>
                    <hr>
                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Income minus Expense'];?>
 = <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['mime']->value,2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>

                    <hr>



                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Vs Expense This Year'];?>
</h4>
                    <hr>
                    <div id="placeholder" class="flot-placeholder"></div>
                    <hr>


                </div>
            </div>
        </div>


    </div>
    <!-- Row end-->


    <!-- Row end-->


    <!-- Row end-->

<?php
}
}
/* {/block "content"} */
}
