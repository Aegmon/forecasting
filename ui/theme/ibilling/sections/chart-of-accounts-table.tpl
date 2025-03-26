<table class="table table-bordered">
    <thead>
        <tr>
            <th>Account #</th>
            <th>Description</th>
            <th>Asset Type</th>
  
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {foreach $accounts as $account}
            <tr>
                <td>{$account['account_number']}</td>
                <td>{$account['description']}</td>
                <td>{$account['asset_type']}</td>
          
                <td>
                    <button class="btn btn-xs btn-warning edit-account" data-id="{$account['id']}">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-xs btn-danger delete-account" data-id="{$account['id']}">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
