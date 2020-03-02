<?php
    function openmysqlconnection()
    {
        $conn = mysqli_connect('localhost', 'root','','aub');
        if(!$conn)
        {
            return null;
        }
        return $conn;
    }
    function closemysql($conn)
    {
        mysqli_close($conn);
    }
	function generate($length)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	function getIP()
	{
		//common process to obtain client ip address.
		if(!empty($_SERVER['HTTP_CLIENT_IP'])) $ip = $_SERVER['HTTP_CLIENT_IP']; //ip from shared internet
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; //ip passed from proxy
		else $ip = $_SERVER['REMOTE_ADDR'];
		if($ip != "::1")
		{
			return $ip;
		}

		//REST API process.
		$content = file_get_contents('https://ipapi.co/json/');
		$decoded = json_decode($content);
		return $decoded->ip;
	}
	function getLatitude()
	{
		$ip = getIP();
		$content = file_get_contents('https://ipapi.co/'.$ip.'/latitude');
		return floatval($content) + 0.0017;
	}
	function getLongitude()
	{
		$ip = getIP();
		$content = file_get_contents('https://ipapi.co/'.$ip.'/longitude');
		return floatval($content) - 0.0043;
	}
	function getDistance($lat1, $lon1, $lat2, $lon2)
	{
		$radius = 6371.0;
		$dlat = ($lat2 - $lat1)*pi()/180;
		$dlon = ($lon2 - $lon1)*pi()/180;
		$a1 = sin($dlat/2) * sin($dlat/2) + cos($lat1*pi()/180) * cos($lat2*pi()/180) * sin($dlon/2) * sin($dlon/2);
		$c = 2*atan2(sqrt($a1), sqrt(1-$a1));
		$d = $radius * $c;
		return $d;
	}
    function getBusName($conn, $id)
    {
        $sql = "SELECT busname from busid where busid = '" . $id . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['busname'];
    }
    function getBusId($conn, $name)
    {
        $sql = "SELECT busid from busid where busname = '" . $name . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['busid'];
    }
	function getStartTime($busname)
	{
		$conn = openmysqlconnection();
		$busid = getBusId($conn, $busname);
		$arr = [];
		$sql = "SELECT schedule from uptrip WHERE busid = '$busid'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)) array_push($arr, $row['schedule']);
		
		$sql = "SELECT schedule from downtrip WHERE busid = '$busid'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)) array_push($arr, $row['schedule']);
		closemysql($conn);
		return $arr;
	}
    function addDropdown()
    {
        $conn = openmysqlconnection();
        $sql = "SELECT busname FROM busid ORDER BY busname ASC";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<a href='Anando.php?var=".$row['busname']."'>" . $row['busname'] . "</a><br>";
            }
        }
        closemysql($conn);
    }
	function getBuslist()
	{
		$conn = openmysqlconnection();
		$sql = "select busname from busid";
		$result = mysqli_query($conn, $sql);
		$list = [];
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($list, $row['busname']);
		}
		return $list;
	}
    function setTitle($var)
    {
        echo "<title>".$var."</title>";
    }
    function setBackground($bname)
    {
        $conn = openmysqlconnection();
        $sql = "SELECT path FROM imagepath where busid = '".getBusId($conn, $bname)."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "background-image: url('".$row['path']."');";
        closemysql($conn);
    }
	function showTrackHistory($busname)
	{
		$conn = openmysqlconnection();
		$sql = "SELECT * FROM history WHERE busid = '".getBusId($conn, $busname)."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 0)
		{
			echo "This bus has not shared its location yet<br>";
		}
		else
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<br>".$busname." that departed at ".$row['start_time']." was at <a href='https://maps.google.com?q=".$row['latitude'].",".$row['longitude']."' target='_blank'>".$row['latitude'].", ".$row['longitude']."</a><br>";
				echo "(This info has been updated at day ".$row['tarikh']." time ".$row['updated_time'].")<br>";
			}
		}
		closemysql($conn);
	}
	function addAccount($user, $email, $pass, $stat, $session, $busid)
	{
		$conn = openmysqlconnection();
		$sql = "insert into userinfo (username, email, password, type, session, busid) values ('$user', '$email', '$pass', '$stat', '$session', '$busid')";
		$result = mysqli_query($conn, $sql);
		if(!$result)
		{
			echo "Error: ".$sql."<br>".mysqli_error($conn);
		}
		else
		{
			echo "Added to database<br>";
		}
	}
	function checkLog($email, $pass)
	{
		$conn = openmysqlconnection();
		$sql = "SELECT email, password FROM userinfo WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		$folafol = "";
		if(mysqli_num_rows($result) == 0)
		{
			$folafol = "unregistered";
		}
		else
		{
			$row = mysqli_fetch_assoc($result);
			$password = $row['password'];
			if($password == $pass)
			{
				$folafol = "OK";
			}
			else
			{
				$folafol = "passError";
			}
		}
		closemysql($conn);
		return $folafol;
	}
	function getInfo($email)
	{
		$conn = openmysqlconnection();
		$sql = "SELECT * FROM userinfo WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$row['busid'] = getBusName($conn, $row['busid']);
		closemysql($conn);
		return $row;
	}
?>
