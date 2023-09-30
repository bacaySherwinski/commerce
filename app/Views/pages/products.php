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

        /* Main container for form and table */
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* Align form to the top */
            margin: 20px; /* Add margin for spacing */
        }

        /* Table styles */
        table {
            border-collapse: collapse;
            width: 67%; /* Adjust table width */
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

        /* Form styles */
        .form-container {
            border: 1px solid #dddddd;
            padding: 10px;
            width: 30%; /* Adjust form width */
        }
        .form-container2 {
            border: 1px solid #dddddd;
            padding: 10px;
            width: 100%; /* Adjust form width */
        }

        .form-container h3 {
            text-align: center;
        }

        .form-container label {
            display: block;
            font-weight: bold;
            margin-top: 10px; /* Add some vertical spacing */
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="file"] {
            border: 1px solid #dddddd;
            padding: 8px;
            width: 90%;
            margin-bottom: 10px; /* Add some vertical spacing */
        }

        .form-container select {
            border: 1px solid #dddddd;
            padding: 8px;
            width: 93%;
            margin-bottom: 10px; /* Add some vertical spacing */
        }

        .form-container input[type="submit"] {
            font-weight: bold;
            display: block; /* Display the submit button as a block element */
            margin-top: 10px; /* Add some vertical spacing */
            background-color: #007BFF; /* Button background color */
            color: #fff; /* Text color */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth hover transition */
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3; /* Change background color on hover */
        }
        /* Modal styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 999; /* Adjust this value as needed */
}

.modal-content {
    background-color: #fff;
    margin: 5% auto; /* Center the modal vertically */
    padding: 20px;
    top: -60;
    border: 1px solid #888;
    width: 100%;
    max-width: 400px; /* Limit the maximum width of the modal */
    position: relative;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}

/* Style for the modal title */
.modal-content h2 {
    text-align: center;
    margin-bottom: 20px;
}

/* Style for form labels and inputs */
.form-container2 label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

.form-container2 input[type="text"],
.form-container2 input[type="file"],
.form-container2 input[type="number"] {
    border: 1px solid #dddddd;
    padding: 8px;
    width: 100%;
    margin-bottom: 10px;
}

/* Style for the submit button */
.form-container2 input[type="submit"] {
    font-weight: bold;
    padding: 10px 20px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-container2 input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Style for form validation errors (if applicable) */
.error-message {
    color: red;
    margin-top: 5px;
}

    </style>
</head>
<body>
    <!-- Main container for form and table -->
    <div class="container">
        <!-- Add Products Form -->
        <div class="form-container">
            <h2>Add Product</h2>
            <form action="/save" method="post">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name">
                <br>
                <label>Description</label>
                <input type="text" name="description" placeholder="Description">
                <br>
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
                <br>
                <label>Price</label>
                <input type="text" name="price" placeholder="Price">
                <br>
                <label>Category</label>
                <input type="text" name="category" placeholder="Category">
                <br>
                <label>Quantity</label>
                <input type="number" name="quantity" placeholder="Quantity">
                <br>
                <input type="submit" value="Save">
            </form>
        </div>
        
        <!-- Table -->
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php foreach ($product as $pr): ?>
                <tr>
                    <td><?= $pr['name'] ?></td>
                    <td><?= $pr['description'] ?></td>
                    <td><img src="data:image/jpeg;base64,<?= base64_encode($pr['image']) ?>" alt="Product Image" width="100" height="100"></td>
                    <td><?= $pr['price'] ?></td>
                    <td><?= $pr['category'] ?></td>
                    <td><?= $pr['quantity'] ?></td>
                    <td><a href="/delete/<?= $pr['id'] ?>" class="delete">Delete</a>|| <a href="#" id="openUpdateModalBtn" class="update-link">Update</a>                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<!-- Modal for Updating Product -->
<div id="updateModal" class="modal">
    <div class="modal-content">
        <span id="closeUpdateModalBtn" class="close">&times;</span>
        <!-- Your modal content for updating products here -->
        <h3>Update</h3>
        <!-- Add form fields or content for updating products here -->
        <div class="form-container2">
            <form action="/update" method="post">
            <label>Name</label>
                <input type="text" name="name" placeholder="Name">
                <br>
                <label>Description</label>
                <input type="text" name="description" placeholder="Description">
                <br>
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
                <br>
                <label>Price</label>
                <input type="text" name="price" placeholder="Price">
                <br>
                <label>Category</label>
                <input type="text" name="category" placeholder="Category">
                <br>
                <label>Quantity</label>
                <input type="number" name="quantity" placeholder="Quantity">
                <br>
                <input type="submit" value="Save">
            </form>
        </div>
    </div>
</div>
<script>
    // Get the update modal and buttons
var openUpdateModalBtn = document.getElementById("openUpdateModalBtn");
var updateModal = document.getElementById("updateModal");
var closeUpdateModalBtn = document.getElementById("closeUpdateModalBtn");

// Function to open the update modal
function openUpdateModal() {
    updateModal.style.display = "block";
}

// Function to close the update modal
function closeUpdateModal() {
    updateModal.style.display = "none";
}

// Event listener for opening the update modal when the button is clicked
openUpdateModalBtn.addEventListener("click", openUpdateModal);

// Event listener for closing the update modal when the close button is clicked
closeUpdateModalBtn.addEventListener("click", closeUpdateModal);

// Event listener for closing the update modal when clicking outside the modal
window.addEventListener("click", function(event) {
    if (event.target == updateModal) {
        closeUpdateModal();
    }
});

</script>
    <!-- JavaScript to handle the modal (if needed) -->
</body>
</html>
