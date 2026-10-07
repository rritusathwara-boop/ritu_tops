function reg_form(str)
{
    document.getElementById("msg1").innerHTML = "";

    // Full Name
    if(str.name.value == "")
    {
        document.getElementById("msg1").innerHTML = "Please Enter Full Name";
        str.name.focus();
        return false;
    }

    if(!str.name.value.match(/^[a-zA-Z ]+$/))
    {
        document.getElementById("msg1").innerHTML = "Name must contain only alphabets";
        str.name.focus();
        return false;
    }

    // Email
    if(str.email.value == "")
    {
        document.getElementById("msg1").innerHTML = "Please Enter Email";
        str.email.focus();
        return false;
    }

    if(!str.email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,3})+$/))
    {
        document.getElementById("msg1").innerHTML = "Please Enter Valid Email";
        str.email.focus();
        return false;
    }

    // Password
    if(str.password.value == "")
    {
        document.getElementById("msg1").innerHTML = "Please Enter Password";
        str.password.focus();
        return false;
    }

    if(str.password.value.length < 6)
    {
        document.getElementById("msg1").innerHTML = "Password must be at least 6 characters";
        str.password.focus();
        return false;
    }

    // Mobile
    if(str.mobile.value == "")
    {
        document.getElementById("msg1").innerHTML = "Please Enter Mobile Number";
        str.mobile.focus();
        return false;
    }

	if(isNaN(str.mobile.value))
	{
		document.getElementById("msg1").innerHTML = "Mobile Number should contain only digits";
		str.mobile.focus();
		return false;
	}
	
    if(!str.mobile.value.match(/^[0-9]{10}$/))
    {
        document.getElementById("msg1").innerHTML = "Mobile Number must be 10 digits";
        str.mobile.focus();
        return false;
    }

    // Gender
    var gender = document.getElementsByName("gender");
    var gen = false;

    for(var i = 0; i < gender.length; i++)
    {
        if(gender[i].checked)
        {
            gen = true;
        }
    }

    if(!gen)
    {
        document.getElementById("msg1").innerHTML = "Please Select Gender";
        return false;
    }

    alert("Registration Successful");
    return true;
}