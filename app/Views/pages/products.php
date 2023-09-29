<?= $this->include('include/top') ?>
<?= $this->include('include/header') ?>
 <?= $this->include('include/navbar') ?>
 <?= $this->include('include/end') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
       
        body, table, .form-container {
            font-family: arial, sans-serif;
        }
        h1 {
            text-align: center;
        }

        
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .delete {
            color: red;
        }

        .form-container {
            border: 1px solid #dddddd;
            padding: 10px;
            margin-left: 20px;
            float: left;
            width: 25%;
        }
        .form-container label {
            display: block;
            font-weight: bold; 
        }

        .form-container input[type="text"] {
            border: 1px solid #dddddd;
            padding: 8px;
            width: 90%;
        }

        .form-container input[type="submit"] {
            font-weight: bold;
        }

        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($product as $pr): ?>
            <tr>
                <td><?= $pr['name'] ?></td>
                <td><?= $pr['description'] ?></td>
                <td><img src="data:image/jpeg;base64,<?= base64_encode($pr['image']) ?>" alt="Product Image" width="100" height="100"></td>
                <td><?= $pr['price'] ?></td>
                <td><?= $pr['category'] ?></td>
                <td><?= $pr['quantity'] ?></td>
               
            </tr>
        <?php endforeach; ?>
    </table>

   
</body>
</html>
