            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phno</th>
                    <th scope="col">Position</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
            <?php
            $i = 0;
            foreach ($employee_list as $key => $value):
            ?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo ++$i;?></th>
                    <td><?php echo $value[1];?></td>
                    <td><?php echo $value[2];?></td>
                    <td><?php echo $value[3];?></td>
                    <td><a href="index.php?content=employee_edit&id=<?php echo $value[0];?>" class="btn btn-info">Edit</a></td>
                    <td><a href="../../functions.php?content=employee_delete&id=<?php echo $value[0];?>" class="btn btn-danger">Delete</a></td>
                  </tr>
                <?php endforeach;?>
                </tbody>
              </table>