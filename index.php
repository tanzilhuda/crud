<?php include('server.php');

//fetch the record to be updated
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $name = $record['name'];
    $address = $record['address'];
    $id = $record['id'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1 style="color: red; text-align: center">CRUD System of PHP</center></header>
<hr>
<?php if (isset($_SESSION['msg'])): ?>
    <div class="msg">
        <?php
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        ?>
    </div>
<?php endif ?>
<table>
        <thread>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Address</th>
                <th colspan="1"> Action</th>
                <th> Delete</th>
            </tr>
        </thread>
        <tbody>
        <?php
        $i=1;
        while ($row = mysqli_fetch_array($results)){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><a class ="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
                <td><a class = "del_btn" href="server.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Are you want to Delete?')">Delete</a></td>
            </tr>
        <?php  }?>

        </tbody>
    </table>

    <form method="POST" action="server.php" >
        <input type="hidden" name="id" value="<?php echo $id; ?> ">
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="input-group">
            <label>Address</label>
            <input type="text" name="address" value="<?php echo $address; ?>">
        </div>
        <div class="input-group">

            <?php if($edit_state == false):?>
                <button class="btn" type="submit" name="save" >Save</button>
            <?php else: ?>
                <button class="btn" type="submit" name="update" >Update</button>
            <?php endif ?>

        </div>
    </form>


</body>
</html>