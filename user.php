<?php
include_once 'navbar.php';
include_once 'connect.php';
$sql = "SELECT * FROM user";
$result = $con->query($sql);
?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-secondary text-black fw-bold fs-5">Info User</div>
    <div class="card-body mt-3 mx-3">
      <a href="add_user.php" class="btn btn-outline-success pl-2 mb-3">
        <i class="bi bi-person-fill-add px-1"></i>เพิ่มข้อมูล
      </a>
      <table class="table table-striped">
        <tr>
          <th class="bg-secondary text-center">No.</th>
          <th class="bg-secondary">Username</th>
          <th class="bg-secondary">Fullname</th>
          <th class="bg-secondary">Email</th>
          <th class="bg-secondary text-center">Action</th>
        </tr>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr class="align-middle">
            <td class="text-center"><?php echo $i;
                                    $i++ ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td class="text-center">
              <a class="btn btn-primary" href="edit_user.php?username=<?php echo $row['username'] ?>">
                <i class="bi bi-pencil-square"></i></a>
              <a class="btn btn-danger" href="del_user.php?username=<?php echo $row['username'] ?>" onclick="return confirm('ยืนยันการลบ ?')">
                <i class="bi bi-trash3"></i></a>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>