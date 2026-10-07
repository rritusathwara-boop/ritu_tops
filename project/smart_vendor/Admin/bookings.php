<?php
include_once('header.php');
?>
   
        <div class="container-fluid p-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Customers List</h2>
                <p class="text-sm text-slate-500 mt-1">View all Bookings.</p>
            </div>


            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>B-ID</th>
									<th>Vendor Name</th>
                                    <th>Customer Name</th>
                                    <th>Event Date</th>
                                    <th>Guest</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							foreach($bookings_arr as $data)
							{
							?>
                                <tr>
                                    <td class="fw-bold"><?php echo $data->id;?></td>
									<td><?php echo $data->vendor_id;?></td>
                                    <td><?php echo $data->customer_id;?></td>
                                    <td><?php echo $data->event_date;?></td>
                                    <td><?php echo $data->guest;?></td>
                                    <td><?php echo $data->total_amount;?></td>
                                    <td><span class="badge bg-success"><?php echo $data->status;?></span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#updateStatusModal"><i class="fas fa-edit"></i> Status</button>
                                        <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-invoice"></i></button>
                                    </td>
                                </tr>
								<?php
								}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Update Status Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Booking Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label class="form-label">Booking Reference</label>
                <input type="text" class="form-control" value="#BK-5092" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Set Status</label>
                <select class="form-select">
                    <option value="pending" selected>Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
