<?php
include_once('header.php');
?>

    
        <!-- Main Content Area -->
        <div class="container-fluid p-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Vendors List</h2>
                <p class="text-sm text-slate-500 mt-1">Manage and view all registered vendors on the platform.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Vendor Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Rating</th>
                                    <th>Location</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							foreach($vendors_arr as $data)
							{
							?>
							<tr>
								<td><?php echo $data->id;?></td>
								<td class="fw-bold"><?php echo $data->name;?></td>
								<td><?php echo $data->category_id;?></td>
								<td><?php echo $data->price;?></td>
								<td><?php echo $data->rating;?></td>
								<td><?php echo $data->location;?></td>
								<td>
									<img src="../assets/upload/vendor/<?php echo $data->image;?>" width="50px" height="80px" >
								</td>
								<td>
									<a href="edit_vendors?edit=<?php echo $data->id;?>"	class="btn btn-sm btn-warning me-1">Edit</a>
									<a href="delete?del_vendors=<?php echo $data->id;?>" class="btn btn-sm btn-danger">Delete</a>
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
