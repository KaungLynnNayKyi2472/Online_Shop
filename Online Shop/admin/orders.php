<?php
    include("../setting/auth.php");
    include("../setting/config.php");
    $orders_data = mysqli_query($con,"SELECT * FROM orders");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
</head>
<body>
    <?php include("Navbar.php");?>
    <div class="container-fluid p-5">
        <div class="row">
            <?php
                while($orders = mysqli_fetch_assoc($orders_data)){
                    if ($orders['status']){
            ?>
                <div class="col d-flex flex-column border border-light rounded p-3">
            <?php } else {?>
                <div class="col d-flex flex-column border border-light rounded p-3">
            <?php }?>
                    <b class="text-blue fs-5"><?php echo $orders['name'];?></b>
                    <i class="text-light fs-5"><?php echo $orders['email'];?></i>
                    <span class="text-light fs-5"><?php echo $orders['phone'];?></span>
                    <i class="text-light fs-5"><?php echo $orders['visa_card'];?></i>
                    <p class="text-light fs-5"><?php echo $orders['address'];?></p>
                    <p class="text-light fs-5"><?php echo $orders['received_date'];?></p>
                    <?php if ($orders['status']){?>
                        <button class="border border-0 rounded bg-green fs-5 py-1">
                            <a href="order_status.php?id=<?php echo $orders['id']?>&status=0" class="text-black text-decoration-none">Undo</a>
                        </button>
                    <?php } else {?>
                        <button class="border border-0 rounded bg-green fs-5 py-1 mb-3">
                            <a href="order_status.php?id=<?php echo $orders['id']?>&status=1" class="text-black text-decoration-none">Mark as Delivered</a>
                        </button>
                        <button class="border border-0 rounded bg-red fs-5 py-1">
                            <a href="order_delete.php?id=<?php echo $orders['id']?>" class="text-light text-decoration-none">Order Cancel</a>
                        </button>
                    <?php }?>
                    <?php
                        $order_id = $orders['id'];
                        $order_item = mysqli_query($con,"SELECT order_item.*,all_items.title FROM order_item LEFT JOIN all_items ON order_item.item_id = all_items.id WHERE order_item.order_id = $order_id");
                        while ($items = mysqli_fetch_assoc($order_item)){
                    ?>
                    <b class="text-light fs-5">
                        <a href="adminitem_detail.php?id=<?php echo $items['item_id'];?>">
                            <?php echo $items['title'];?>
                        </a>
                        (<?php echo $items['qty'];?>)
                    </b>
                    <?php }?>
                </div>
                </div>
            <?php }?>
        </div>
    </div>
</body>
</html>