<ul class="nav" id="side-menu">

    <li class="nav-header">
        <div class="dropdown profile-element"> <span>

                {if $user['img'] eq 'gravatar'}
                    <img src="http://www.gravatar.com/avatar/{($user['username'])|md5}?s=64" class="img-circle" alt="{$user['fullname']}">
                                {elseif $user['img'] eq ''}
                                    <img src="{$app_url}ui/lib/imgs/default-user-avatar.png"  class="img-circle" style="max-width: 64px;" alt="">
                                {else}
                                    <img src="{$user['img']}" class="img-circle" style="max-width: 64px;" alt="{$user['fullname']}">
                {/if}
                             </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{$user['fullname']}</strong>
                             </span> <span class="text-muted text-xs block">{$_L['My Account']} <b class="caret"></b></span> </span> </a>
            <ul class="dropdown-menu animated fadeIn m-t-xs">
                <li><a href="{$_url}settings/users-edit/{$user['id']}/">{$_L['Edit Profile']}</a></li>
                <li><a href="{$_url}settings/change-password/">{$_L['Change Password']}</a></li>

                <li class="divider"></li>
                <li><a href="{$_url}logout/">{$_L['Logout']}</a></li>
            </ul>
        </div>
    </li>

    {$admin_extra_nav[0]}

    {if has_access($user->roleid,'reports')}
        <li {if $_application_menu eq 'dashboard'}class="active"{/if}><a href="{$_url}{$_c['redirect_url']}/"><i class="fa fa-tachometer"></i> <span class="nav-label">{$_L['Dashboard']}</span></a></li>
    {/if}




    {$admin_extra_nav[1]}








       {$admin_extra_nav[2]}
    {if has_access($user->roleid,'transactions')}
        {if $_c['accounting'] eq '1'}
            <li class="{if $_application_menu eq 'transactions'}active{/if}">
                <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Bank Reconciliation</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                            <li><a href="{$_url}transactions/chart-of-accounts/">Chart of Accounts</a></li>
                                <li><a href="{$_url}transactions/deposit/">{$_L['New Deposit']}</a></li>
                            <li><a href="{$_url}transactions/expense/">Disbursement </a></li>
                            <li><a href="{$_url}transactions/reconciliation/">Reconciliation </a></li>
                            <li><a href="{$_url}transactions/list/">All Transactions</a></li>
                </ul>
            </li>
        {/if}
    {/if}





    {$admin_extra_nav[3]}




        {if ($_c['invoicing'] eq '1') OR ($_c['quotes'] eq '1')}



            <li class="{if $_application_menu eq 'invoices'}active{/if}">
                <a href="#"><i class="icon-credit-card-1"></i> <span class="nav-label">{$_L['Sales']}</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    {if $_c['invoicing'] eq '1'}
                             {if $user->roleid != '1'}
                        <li><a href="{$_url}invoices/list/">{$_L['Invoices']}</a></li>
                        {/if}
                    

                    {if $user->roleid != '0'}
                        <li><a href="{$_url}invoices/add/">{$_L['New Invoice']}</a></li>
                    {/if}

             
        
                    {/if}

                   
                
                </ul>
            </li>

        {/if}


    {if has_access($user->roleid,'calendar')}
        <li {if $_application_menu eq 'calendar'}class="active"{/if}><a href="{$_url}calendar/events/"><i class="fa fa-calendar"></i> <span class="nav-label">{$_L['Calendar']}</span></a></li>
    {/if}



    {$admin_extra_nav[4]}

    {if has_access($user->roleid,'bank_n_cash')}
        {if $_c['accounting'] eq '1'}
            <li class="{if $_application_menu eq 'accounts'}active{/if}">
                <a href="#"><i class="fa fa-university"></i> <span class="nav-label">Book of Accounts</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{$_url}accounts/add/">{$_L['New Account']}</a></li>

                    <li><a href="{$_url}accounts/ledger/">General Ledger</a></li>
                    <li><a href="{$_url}accounts/journal/">General Journal</a></li>
           
                    <li><a href="{$_url}generate/balance-sheet/">Trial Balance</a></li>

                </ul>
            </li>
        {/if}

    {/if}


    {$admin_extra_nav[5]}

    {if has_access($user->roleid,'products_n_services')}

    {if ($_c['invoicing'] eq '1') OR ($_c['quotes'] eq '1')}
        <li class="{if $_application_menu eq 'ps'}active{/if}">
            <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">Inventory</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="{$_url}ps/p-list/">{$_L['Products']}</a></li>
               
 


            </ul>
        </li>
    {/if}

    {/if}
    {$admin_extra_nav[6]}
    {if has_access($user->roleid,'reports')}
            {if $_c['accounting'] eq '1'}
            <li class="{if $_application_menu eq 'reports'}active{/if}">
            <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Cash Flow</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="{$_url}reports/statement/">{$_L['Account Statement']}</a></li>
                <li><a href="{$_url}reports/inflow/">Cash Inflow</a></li>
                <li><a href="{$_url}reports/outflow/">Cash Outflow</a></li>
                <li><a href="{$_url}reports/income-vs-expense/">{$_L['Income Vs Expense']}</a></li>
                <li><a href="{$_url}reports/by-date/">{$_L['Reports by Date']}</a></li>
                {*<li><a href="{$_url}reports/cats/">{$_L['Reports by Category']}</a></li>*}
                {foreach $sub_menu_admin['reports'] as $sm_report}
                    {$sm_report}
                {/foreach}
            </ul>
            </li>
        {/if}
    {/if}
    {if has_access($user->roleid,'settings')}
    <li class="{if $_application_menu eq 'settings'}active{/if}" id="li_settings">
            <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">{$_L['Settings']} </span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="{$_url}settings/users/">{$_L['Staff']}</a></li>
               
            </ul>
            </li>
    {/if}



</ul>
