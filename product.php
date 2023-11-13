<?php
include_once 'navbar.php';
include_once 'connect.php';
$sql = "SELECT * FROM product";
$result = $con->query($sql);
?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-secondary text-black fw-bold fs-5">Product information</div>
    <div class="card-body mt-3 mx-3">
      <a href="add_pro.php" class="btn btn-outline-success pl-2 mb-3">
        <i class="bi bi-bag-plus-fill px-1"></i>เพิ่มสินค้า
      </a>
      <table class="table table-striped">
        <tr>
          <th class="bg-secondary text-center">ID.</th>
          <th class="bg-secondary">Product Name</th>
          <th class="bg-secondary text-center">Price</th>
          <th class="bg-secondary text-center">Amount</th>
          <th class="bg-secondary text-center">Status</th>
          <th class="bg-secondary text-center">Action</th>
        </tr>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr class="align-middle">
          <td class="text-center"><?php echo $row['pro_id'] ?></td>
          <td><?php echo $row['pro_name'] ?></td>
          <td class="text-center"><?php echo $row['pro_price'] ?></td>
          <td class="text-center"><?php echo $row['pro_amount'] ?></td>
          <td class="text-center"><?php
                                    if ($row['pro_status'] == 1) {
                                      echo "สินค้าพร้อมจำหน่าย";
                                    } else if ($row['pro_status'] == 2) {
                                      echo "สินค้าหมด";
                                    } else if($row['pro_status'] == 3){
                                      echo "สินค้ายกเลิก";
                                    }
                                    ?></td>
          <td class="text-center">
            <a class="btn btn-primary" href="edit_pro.php?pro_id=<?php echo $row['pro_id'] ?>">
              <i class="bi bi-pencil-square"></i></a>
            <a class="btn btn-danger" href="del_pro.php?pro_id=<?php echo $row['pro_id'] ?>"
              onclick="return confirm('ยืนยันการลบ ?')">
              <i class="bi bi-trash3"></i></a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>