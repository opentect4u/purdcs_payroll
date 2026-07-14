  <div class="main-panel">
      <div class="content-wrapper">
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-10">
                          <h3>Deductions</h3>
                          <?php if ($this->session->flashdata('msg')) { ?>
                              <div class="alert alert-danger" role="alert">
                                  <?php echo $this->session->flashdata('msg'); ?>
                              </div>
                          <?php } ?>
                      </div>
                      <div class="col-2">
                          <small><a href="<?php echo site_url("slrydedad"); ?>" class="btn btn-warning text-white customFloat_Uts" <?= $user_status != 'A' ? 'onclick="return false;"' : '' ?>>Add</a></small>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-12">
                          <div class="table-responsive" id='permanent'>
                              <table id="order-listing" class="table">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Date</th>
                                          <th>Category</th>
                                          <th>Net Salary</th>
                                          <th>Edit</th>
                                          <th>Delete</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1;
										$total_sal = 0;
                                        foreach ($deduction_list as $ded) {
									  	$total_sal += $ded->net_sal;
									  ?>
                                          <tr>
                                              <td><?= $i ?></td>
                                              <td><?= $ded->effective_date ?></td>
                                              <td><?= $ded->category ?></td>
                                              <td><?= $ded->net_sal ?></td>
                                              <td><a href="slrydedad?catg_id=<?= $ded->catg_id ?>&sys_dt=<?= $ded->effective_date ?>&flag=1" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                      <i class="fa fa-edit text-warning fa-2x"></i>
                                                  </a></td>
                                            <td><a href="deddl?catg_id=<?= $ded->catg_id ?>&sys_dt=<?= $ded->effective_date ?>" data-toggle="tooltip" data-placement="bottom" title="Delete" class="delete">
                                                      <i class="fa fa-trash text-danger fa-2x"></i>
                                                  </a></td>
                                          </tr>

                                      <?php $i++;
                                        } ?>
                                  </tbody>
								  <tfoot>
									  <tr>
										  <td colspan="3" class="h3">Total: </td>
										  <td colspan="3" class="text-left h3"><?= $total_sal ?></td>
									  </tr>
								  </tfoot>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script>
      $('.delete').click(function() {
        if (confirm("Do you really want to delete this record?")) {
            return true;
        }else{
            return false;
        }
    });
  </script>