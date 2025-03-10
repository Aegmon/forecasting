<?php
/* Smarty version 3.1.39, created on 2024-12-02 17:47:18
  from 'C:\xampp\htdocs\forecasting\ui\theme\ibilling\dashboard_canvas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_674d8226098c76_87306219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6d199c49e98f3e14a56609122eb47bff1dce366' => 
    array (
      0 => 'C:\\xampp\\htdocs\\forecasting\\ui\\theme\\ibilling\\dashboard_canvas.tpl',
      1 => 1733131560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674d8226098c76_87306219 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1555975415674d822603fef7_56229580', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['tpl_admin_layout']->value));
}
/* {block "content"} */
class Block_1555975415674d822603fef7_56229580 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1555975415674d822603fef7_56229580',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo $_smarty_tpl->tpl_vars['dashboard_section_0']->value;?>




    <div class="row">
        <div class="col-md-12" id="ib_graph"></div>
        <div class="col-md-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="row" id="d_ajax_summary">

                        <div class="col-md-4"><div class="chart-statistic-box">
                                <div class="chart-txt">
                                    <div class="chart-txt-top">
                                        <p><span class="amount number"><?php echo $_smarty_tpl->tpl_vars['net_worth']->value;?>
</span></p>
                                        <hr>
                                        <p class="caption"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Net Worth'];?>
</p>
                                    </div>
                                    <table class="tbl-data">
                                        <tr>
                                            <td class="amount"><?php echo $_smarty_tpl->tpl_vars['ti']->value;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Today'];?>
</td>
                                        </tr>
                                        <tr>
                                            <td class="amount"><?php echo $_smarty_tpl->tpl_vars['te']->value;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['_L']->value['Expense Today'];?>
</td>
                                        </tr>
                                        <tr>
                                            <td class="amount"><?php echo $_smarty_tpl->tpl_vars['mi']->value;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income This Month'];?>
</td>
                                        </tr>
                                        <tr>
                                            <td class="amount"><?php echo $_smarty_tpl->tpl_vars['me']->value;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['_L']->value['Expense This Month'];?>
</td>
                                        </tr>
                                    </table>
                                </div>

                            </div></div>


                        <div class="col-md-8">


                            <div class="chart-container">
                                <div class="" style="height:350px" id="inc_vs_exp_t"></div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div id="d_chart" style="height: 350px;"></div>
                </div>
            </div>

        </div>
    </div>


    <div class="row" id="sort_2">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="#" id="set_goal" class="btn btn-primary btn-xs pull-right"><i class="fa fa-bullseye"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Set Goal'];?>
</a>
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Net Worth n Account Balances'];?>
</h5>
                </div>
                <div class="ibox-content" style="min-height: 365px;">
                    <div>
                        <h3 class="text-center amount"><?php echo $_smarty_tpl->tpl_vars['net_worth']->value;?>
</h3>
                        <div>
                            <span class="amount"><?php echo $_smarty_tpl->tpl_vars['net_worth']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['of'];?>
 <span class="amount"><?php echo $_smarty_tpl->tpl_vars['_c']->value['networth_goal'];?>
</span>
                            <small class="pull-right"><span class="amount"><?php echo $_smarty_tpl->tpl_vars['pg']->value;?>
</span>%</small>
                        </div>


                        <div class="progress progress-small">
                            <div style="width: <?php echo $_smarty_tpl->tpl_vars['pgb']->value;?>
%;" class="progress-bar progress-bar-<?php echo $_smarty_tpl->tpl_vars['pgc']->value;?>
"></div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered" style="margin-top: 26px;">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance'];?>
</th>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                                <td class="text-right"><span class="amount<?php if ($_smarty_tpl->tpl_vars['ds']->value['balance'] < 0) {?> text-red<?php }?>"><?php echo $_smarty_tpl->tpl_vars['ds']->value['balance'];?>
</span></td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                    </table>
                </div>
            </div>
        </div>


      

    </div>



    <div class="row" id="sort_3">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Latest Income'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inc']->value, 'incs');
$_smarty_tpl->tpl_vars['incs']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['incs']->value) {
$_smarty_tpl->tpl_vars['incs']->do_else = false;
?>
                            <tr>
                                <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['incs']->value['date']));?>
</td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/manage/<?php echo $_smarty_tpl->tpl_vars['incs']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['incs']->value['description'];?>
</a> </td>
                                <td class="text-right amount"><?php echo $_smarty_tpl->tpl_vars['incs']->value['amount'];?>
</td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                    </table>
                </div>
            </div>

        </div>


        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Latest Expense'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['exp']->value, 'exps');
$_smarty_tpl->tpl_vars['exps']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['exps']->value) {
$_smarty_tpl->tpl_vars['exps']->do_else = false;
?>
                            <tr>
                                <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['exps']->value['date']));?>
</td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/manage/<?php echo $_smarty_tpl->tpl_vars['exps']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['exps']->value['description'];?>
</a> </td>
                                <td class="text-right amount"><?php echo $_smarty_tpl->tpl_vars['exps']->value['amount'];?>
</td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                    </table>
                </div>
            </div>

        </div>


    </div>


<?php
}
}
/* {/block "content"} */
}
