<?php


include('function.php');


include('views/header.php');


if($_GET['page'] == 'donation'){


	 if(empty($_SESSION['id']))
    {
        
        echo "<p>Access Denied</p><a href = 'http://give-com.stackstaging.com/?logout=1'>click me to go to login page</a> ";
    }else{

    	include('views/donation.php');

    }


	

}else if($_GET['page'] == 'mydonation'){


	if(empty($_SESSION['id']))
    {
        
        echo "<p>Access Denied</p><a href = 'http://give-com.stackstaging.com/?logout=1'>click me to go to login page</a> ";
    }else{

    	include('views/mydonation.php');

    }

}else if($_GET['page'] == 'medicine/blood'){


	if(empty($_SESSION['id']))
    {
        
        echo "<p>Access Denied</p><a href = 'http://give-com.stackstaging.com/?logout=1'>click me to go to login page</a> ";
    }else{

    	include('views/medicine&blood.php');

    }

	

}else if($_GET['page'] == 'search'){


	if(empty($_SESSION['id']))
    {
        
        echo "<p>Access Denied</p><a href = 'http://give-com.stackstaging.com/?logout=1'>click me to go to login page</a> ";
    }else{

    	include('views/search.php');

    }

}else if ($_GET['page'] == 'request'){


	if(empty($_SESSION['id']))
    {
        
        echo "<p>Access Denied</p><a href = 'http://give-com.stackstaging.com/?logout=1'>click me to go to login page</a> ";
    }else{

    	include('views/request.php');

    }

	
}else if ($_GET['page'] == 'myrequest'){


	if(empty($_SESSION['id']))
    {
        
        echo "<p>Access Denied</p><a href = 'http://give-com.stackstaging.com/?logout=1'>click me to go to login page</a> ";
    }else{

    	include('views/myrequest.php');

    }

	
}else if ($_GET['page'] == 'medicine'){


	if(empty($_SESSION['id']))
    {
        
        echo "<p>Access Denied</p><a href = 'http://give-com.stackstaging.com/?logout=1'>click me to go to login page</a> ";
    }else{

    	include('views/medicine.php');

    }


	
}else if ($_GET['page'] == 'mymedicine'){


	if(empty($_SESSION['id']))
    {
        
        echo "<p>Access Denied</p><a href = 'http://give-com.stackstaging.com/?logout=1'>click me to go to login page</a> ";
    }else{

    	include('views/mymedicine.php');

    }

	
}

else{

	include('views/home.php');
}

include('views/footer.php');


?>

