<?php
include_once('header.php');
?>

    
        <div class="container-fluid p-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Customers List</h2>
                <p class="text-sm text-slate-500 mt-1">View all Customers.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>C-ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							foreach($customers_arr as $data)
							{
							?>
                                <tr>
                                    <td><?php echo $data->id;?></td>
                                    <td class="fw-bold"><?php echo $data->name;?></td>
                                    <td><?php echo $data->email;?></td>
                                    <td><?php echo $data->mobile;?></td>
                                    <td><?php echo $data->gender;?></td>
                                    <td>
										<a href="user_profile?id=<?php echo $data->id; ?>" class="btn btn-info btn-sm"> <i class="fas fa-eye"></i></a>
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
