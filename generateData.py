import datetime
import random
import mysql.connector

# Function to generate SQL insert statements for sys_transactions table
def generate_cashflow_data(start_date, end_date, total_records=500, transaction_type='Income'):
    insert_statements = []
    
    # Define categories based on transaction type
    if transaction_type == 'Income':
        categories = ['Sales', 'Services', 'Interest']
    elif transaction_type == 'Expense':
        categories = ['Internet', 'Electric', 'Water', 'Salary', 'Rent']
    else:
        categories = ['Misc']
    
    statuses = ['Cleared', 'Uncleared']
    
    current_date = start_date
    num_days = (end_date - start_date).days + 1
    records_per_day = total_records // num_days  # Distribute records evenly per day

    # Ensure we generate at least 'total_records'
    remaining_records = total_records % num_days
    day_counter = 0
    
    current_balance = 0.0  # Initialize the running balance
    
    while current_date <= end_date:
        day_records = records_per_day
        if day_counter < remaining_records:
            day_records += 1  # Distribute remaining records evenly across days
        
        for _ in range(day_records):
            status = random.choice(statuses)
            amount = round(random.uniform(100, 5000), 2)  # Random amount between 100 and 5000
            method = 'Cash'  # Assuming 'Cash' for simplicity; can randomize if needed
            ref = ''  # Empty string as per PHP code
            tax = '0.00'  # As per PHP code
            tags = 'sample_tag'  # Replace with appropriate tag generation if needed
            attachments = ''  # Empty string or sample path
            currency = 0  # Assuming default; adjust as needed
            currency_symbol = None
            currency_prefix = None
            currency_suffix = None
            currency_rate = '1.0000'  # String as per PHP code
            base_amount = '0.0000'  # String as per PHP code
            iid = 0
            vid = 0
            aid = 0
            company_id = 0
            source = ''
            rid = 0
            pid = 0
            archived = 0
            trash = 0
            flag = 0
            c1 = 0
            c2 = 0
            c3 = 0
            c4 = 0
            c5 = 0
            updated_at = datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')
            
            if transaction_type == 'Income':
                category = random.choice(categories)
                description = f"{category} {current_date.strftime('%b %d %Y')}"
                cr = float(amount)
                dr = 0.00
                payerid = 3  # As per PHP code for Income
                payeeid = 0
                bal = current_balance + cr
                current_balance += cr
                payer = ''
                payee = ''
            else:  # Expense
                category = random.choice(categories)
                description = category
                dr = float(amount)
                cr = 0.00
                payeeid = 3  # As per PHP code for Expense
                payerid = 0
                bal = current_balance - dr
                current_balance -= dr
                payer = ''
                payee = ''
            
            # Convert tags list to comma-separated string if necessary
            if isinstance(tags, list):
                tags_str = ','.join(tags)
            else:
                tags_str = tags  # Assuming it's already a string
            
            # Prepare SQL insert statement with the running balance
            insert_statements.append((
                'BUSINESS ACCOUNTS',          # account
                transaction_type,             # type
                category,                     # category
                amount,                       # amount
                payer,                        # payer
                payee,                        # payee
                payerid,                      # payerid
                payeeid,                      # payeeid
                method,                       # method
                ref,                          # ref
                status,                       # status
                description,                  # description
                tags_str,                     # tags
                tax,                          # tax
                current_date.strftime('%Y-%m-%d'),  # date
                dr,                           # dr
                cr,                           # cr
                bal,                          # bal
                iid,                          # iid
                currency,                     # currency
                currency_symbol,              # currency_symbol
                currency_prefix,              # currency_prefix
                currency_suffix,              # currency_suffix
                currency_rate,                # currency_rate
                base_amount,                  # base_amount
                company_id,                   # company_id
                vid,                          # vid
                aid,                          # aid
                updated_at,                   # created_at
                updated_at,                   # updated_at
                None,                         # updated_by
                attachments,                  # attachments
                source,                       # source
                rid,                          # rid
                pid,                          # pid
                archived,                     # archived
                trash,                        # trash
                flag,                         # flag
                c1,                           # c1
                c2,                           # c2
                c3,                           # c3
                c4,                           # c4
                c5                            # c5
            ))
        
        # Move to the next day
        current_date += datetime.timedelta(days=1)
        day_counter += 1
    
    return insert_statements

# Function to insert generated data into the database and update balance in sys_accounts
def insert_into_db(data):
    # Database connection setup
    connection = mysql.connector.connect(
        host='localhost',
        user='root',
        password='',
        database='ibilling'
    )

    cursor = connection.cursor()

    # Insert the generated data into the sys_transactions table
    insert_query = """
    INSERT INTO sys_transactions (
        account, type, category, amount, payer, payee, payerid, payeeid, method, ref, 
        status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, 
        currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, 
        created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, 
        flag, c1, c2, c3, c4, c5
    )
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);
    """

    num_placeholders = insert_query.count('%s')
    print(f"Number of placeholders in INSERT statement: {num_placeholders}")

    # Verify that all records have the correct number of elements
    for idx, record in enumerate(data):
        if len(record) != num_placeholders:
            print(f"Record {idx} has {len(record)} elements; expected {num_placeholders}.")
            return

    try:
        cursor.executemany(insert_query, data)
        connection.commit()
        print(f"{cursor.rowcount} records inserted successfully.")

        # Compute the total balance after the transactions
        cursor.execute("SELECT SUM(cr) - SUM(dr) FROM sys_transactions")
        total_cash_flow = cursor.fetchone()[0] or 0

        # Retrieve the initial balance from sys_accounts
        cursor.execute("SELECT balance FROM sys_accounts WHERE id = 1")
        initial_balance = cursor.fetchone()[0] or 0

        # Compute the new total balance
        new_balance = initial_balance + total_cash_flow

        # Update the balance in sys_accounts
        update_balance_query = "UPDATE sys_accounts SET balance = %s WHERE id = 1"
        cursor.execute(update_balance_query, (new_balance,))
        connection.commit()

        print(f"sys_accounts balance updated successfully to {new_balance:.2f}.")

    except mysql.connector.Error as err:
        print(f"Error: {err}")
        connection.rollback()
    finally:
        cursor.close()
        connection.close()

# Define the date ranges
today = datetime.date.today()
oct_2023 = datetime.date(2023, 10, 1)

# Generate the SQL insert data for Oct 2023 to current date as Income (Deposits)
income_data = generate_cashflow_data(
    start_date=oct_2023,
    end_date=today,
    total_records=500,
    transaction_type='Income'
)

# Generate the SQL insert data for the same range as Expense
expense_data = generate_cashflow_data(
    start_date=oct_2023,
    end_date=today,
    total_records=200,
    transaction_type='Expense'
)

# Combine both datasets
generated_data = income_data + expense_data

# Insert the generated data into the database and update the balance
insert_into_db(generated_data)
