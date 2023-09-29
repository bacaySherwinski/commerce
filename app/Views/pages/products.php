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
            width: 100%;
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

        /* Define custom button styles */
        .custom-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF; /* Button background color */
            color: #fff; /* Text color */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth hover transition */
        }

        .custom-button:hover {
            background-color: #0056b3; /* Change background color on hover */
        }

        /* Modal styles */
        .modal {
    display: none;
    position: fixed;
    top: 1px;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 999; /* Adjust this value as needed */
}


        .modal-content {
            background-color: #fff;
            margin: 2% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
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

    <!-- Add Products Button with Bootstrap Styling -->
    <button id="openModalBtn" class="custom-button">Add Products</button>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span id="closeModalBtn" class="close">&times;</span>
            <!-- Your modal content here -->
            <h2>Add Products</h2>
            <!-- Add form fields or content for adding products here -->
            <div class="form-container">
        <form action="/save" method="post">
            <label>Name</label>
            <input type="hidden" name="id" value="<?= isset($stu) ? $stu['id'] : '' ?>">
            <input type="text" name="name" placeholder="Name" value="<?= isset($stu) ? $stu['name'] : '' ?>">
            <br>
            <label>Address</label>
            <input type="text" name="address" placeholder="Address" value="<?= isset($stu) ? $stu['address'] : '' ?>">
            <br>
            <label>Phone Number</label>
            <input type="text" name="number" placeholder="Phone Number" value="<?= isset($stu) ? $stu['number'] : '' ?>">
            <br>
            <label>Sex</label>
            <input type="text" name="sex" placeholder="Sex" value="<?= isset($stu) ? $stu['sex'] : '' ?>">
            <br>
            <label>Id Number</label>
            <input type="text" name="studentId" placeholder="Id Number" value="<?= isset($stu) ? $stu['studentId'] : '' ?>">
            <br>
            <div style="margin-top: 10px;"></div>
            <input type="submit" value="Save">
        </form>
    </div>
        </div>
    </div>

    <!-- JavaScript to handle the modal -->
    <script>
        // Get the modal and buttons
        var openModalBtn = document.getElementById("openModalBtn");
        var modal = document.getElementById("myModal");
        var closeModalBtn = document.getElementById("closeModalBtn");

        // Function to open the modal
        function openModal() {
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Event listener for opening the modal when the button is clicked
        openModalBtn.addEventListener("click", openModal);

        // Event listener for closing the modal when the close button is clicked
        closeModalBtn.addEventListener("click", closeModal);

        // Event listener for closing the modal when clicking outside the modal
        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                closeModal();
            }
        });
    </script>
</body>
</html>
