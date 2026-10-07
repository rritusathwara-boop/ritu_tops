<?php
include_once('header.php');
?>
    

        <div class="container-fluid p-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Categories List</h2>
                <p class="text-sm text-slate-500 mt-1">Manage and view all categories on the platform.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
									<th>Image</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							foreach($categories_arr as $data)
							{
							?>
								<tr>
                                    <td><?php echo $data->id;?></td>
                                    <td class="fw-bold"><?php echo $data->name;?></td>
									<td><img src="../assets/upload/category/<?php echo $data->image;?>" width="50px" height="80px" >	</td>
                                    <td><?php echo $data->description;?></td>
                                    <td>
                                        <a href="edit_categories?edit=<?php echo $data->id;?>"	class="btn btn-sm btn-warning me-1">Edit</a>
									    <a href="delete?del_categories=<?php echo $data->id;?>" class="btn btn-sm btn-danger">Delete</a>
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
