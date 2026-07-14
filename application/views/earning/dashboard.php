  <div class="main-panel">
      <div class="content-wrapper">
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-10">
                          <h3>Earning</h3>
                          <?php if ($this->session->flashdata('msg')) { ?>
                              <div class="alert alert-danger" role="alert">
                                  <?php echo $this->session->flashdata('msg'); ?>
                              </div>
                          <?php } ?>
                      </div>
                      <div class="col-2">
                          <a href="<?php echo site_url("slryad"); ?>" class="btn btn-warning text-white customFloat_Uts" <?= $user_status != 'A' ? 'onclick="return false;"' : '' ?>>Add</a>
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
                                          <th>Total Gross</th>
                                          <th>Edit</th>
                                          <th>Delete</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1;
							 			$total_gross = 0;
                                        foreach ($sal_dtls as $sal) {
									  $total_gross += $sal->final_gross;
									  ?>
                                          <tr>
                                              <td><?= $i ?></td>
                                              <td><?= $sal->effective_date ?></td>
                                              <td><?= $sal->category ?></td>
                                              <td><?= $sal->final_gross ?></td>
                                              <td><a href="slryad?catg_id=<?= $sal->catg_id ?>&sys_dt=<?= $sal->effective_date ?>&flag=1" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                      <i class="fa fa-edit text-warning fa-2x"></i>
                                                  </a></td>
                                            <td><a href="slrydel?catg_id=<?= $sal->catg_id ?>&sys_dt=<?= $sal->effective_date ?>" data-toggle="tooltip" data-placement="bottom" title="Delete" class="delete">
                                                      <i class="fa fa-trash text-danger fa-2x"></i>
                                                  </a></td>
                                          </tr>

                                      <?php $i++;
                                        } ?>
                                  </tbody>
								  <tfoot>
									  <tr>
										  <td colspan="3" class="h3">Total: </td>
										  <td colspan="3" class="text-left h3"><?= $total_gross ?></td>
									  </tr>
								  </tfoot>
                              </table>
                          </div>
                          <div class="table-responsive" id='temporary' style="display: none;">
                              <table id="order-listing" class="table">
                                  <thead>
                                      <tr>
                                          <th>Emp name</th>
                                          <th>Designation</th>
                                          <th>Pay Amount</th>
                                          <th>Net Payable</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
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