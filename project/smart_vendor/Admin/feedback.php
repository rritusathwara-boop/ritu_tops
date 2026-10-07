<?php
include_once('header.php');
?>


        <div class="container-fluid p-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800"> Feedback List</h2>
                <p class="text-sm text-slate-500 mt-1">Happy customers feedback.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Vendor</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							foreach($feedback_arr as $data)
							{
							?>
                                <tr>
                                    <td class="text-center"><?php echo $data->id;?></td>
                                    <td><?php echo $data->customer_id;?></td>
                                    <td><?php echo $data->vendor_id;?></td>
                                    <td class="text-warning text-center"><?php echo $data->rating;?></td>
                                    <td><?php echo $data->comment;?></td>
                                    <td class="text-center"><?php echo $data->date;?></td>
                                    <td class="text-center">
                                        <a href="delete?del_feedback=<?php echo $data->id;?>" class="btn btn-sm btn-danger" title="Delete Feedback"><i class="fas fa-trash"></i></a>
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

</body>
</html>
