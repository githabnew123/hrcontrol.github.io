            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Duty_In</th>
                    <th scope="col">Duty_OUt</th>
                  </tr>
                </thead>
            <?php
            $i = 0;
            foreach ($data as $key => $value):
            ?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo ++$i;?></th>
                    <td><?php echo $value[1];?></td>
                    <td><?php echo $value[2];?></td>
                    <td><?php echo $value[3];?></td>
                    <td><?php echo $value[4];?></td>
                  </tr>
                <?php endforeach;?>
                </tbody>
              </table>
