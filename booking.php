<?php include('bookingorder.php');

    // fetch the record to be updated
    if (isset($_GET['edit'] )) {
        $id = $_GET['edit']; 
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT * FROM orders WHERE id=$id;");
        $record = mysqli_fetch_array($rec); 
        $name = $record['name'];
        $address = $record['address'];
        $phone = $record['phone'];
        $toname = $record['toname'];
        $toaddress = $record['toaddress'];
        $tophone = $record['tophone'];
        $weight = $record['weight'];
        $id = $record['id'];
    }

?> 
<!DOCTYPE html>
<html>
<head>
    <title>Booking Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/book.css">
</head>
<body>
      <?php if (isset($_SESSION['msg'])):  ?>     
      <div class="msg">
        <?php
             echo $_SESSION['msg'];
             unset($_SESSION['msg']);
        ?>
      </div>
    <?php endif ?>
    <h1 style="text-align: center; color: white; background-color: teal; padding: 30px;">PLACE YOUR ORDER HERE !</h1>
<section>
    <div style="border:5px solid powderblue; width: 250px; height: 630px; margin: 1px; font-size: 20px; color: white; background-color: powderblue;">
        <h5 style="font-size: 20px;"> <br><br><br></h5>
    </div>
</section>
<form method="post" action="bookingorder.php">

<input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
        <label>Your Full Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required>
    </div>
    <div class="input-group">
        <label>Your Complete Address:</label>
        <input type="text" name="address" value="<?php echo $address; ?>" required>
    </div>
    <div class="input-group">
    <label>Your Contact Number:</label>
    <input type="number" name="phone" value="<?php echo $phone; ?>" title="Please enter only numbers">
</div>



    <div class="input-group">
        <label>To Full Name:</label>
        <input type="text" name="toname" value="<?php echo $toname; ?>" required>
    </div>
    <div class="input-group">
        <label>To Complete Address:</label>
        <input type="text" name="toaddress" value="<?php echo $toaddress; ?>" required>
    </div>
    <div class="input-group">
    <label>To Contact Number:</label>
    <input type="number" name="tophone" value="<?php echo $tophone; ?>"  title="Please enter only numbers">
</div>


    <div class="input-group">
        <label>Package Weight</label>
        <input type="number" name="weight" value="<?php echo $weight; ?>" required>
    </div>
    <div class="input-group">
        <?php if ($edit_state == false): ?>
              <button type="submit" name="save" class="btn">Place Order !</button>
        <?php else: ?>
              <button type="submit" name="update" class="btn">Update</button>
        <?php endif ?>
    </div>   
</form>
</body>
</html>
