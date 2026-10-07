
<?php

if(isset($_SESSION['user_email']))
{
	
}
else
{
	echo "<script>window.location='index';</script>";
}	
include_once('header.php');

?>

<div class="container py-5">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            
            <div class="card shadow">
                
                <div class="card-header bg-primary text-white">
                    <h3>Edit Profile</h3>
                </div>

                <div class="card-body">

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">Customer ID</label>
                            <input type="text" class="form-control" value="<?php echo $fetch->id; ?>"  readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text"  name="name"  class="form-control" value="<?php echo $fetch->name; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"  class="form-control" value="<?php echo $fetch->email; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <input type="text"  name="mobile" class="form-control" value="<?php echo $fetch->mobile; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gender</label>

                            <select name="gender" class="form-select">
                                <option value="Male"
                                <?php if($fetch->gender=="Male") echo "selected"; ?>>
                                Male
                                </option>

                                <option value="Female"
                                <?php if($fetch->gender=="Female") echo "selected"; ?>>
                                Female
                                </option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit"  name="submit" class="btn btn-success">
                                Update Profile
                            </button>
                            <a href="user_profile" class="btn btn-secondary">Back</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
include_once('footer.php');
?>

