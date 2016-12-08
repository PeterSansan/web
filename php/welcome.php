<?php 
	//echo "欢迎".$_POST["fname"]."!"."<br>";
	//echo "你的年龄是".$_REQUEST["age"]."岁。"."<br>"; 	//$_REQUEST变量包含了$_GET、$_POST和$_COOKIE的内容。


/*
何时使用 method="get"？
在 HTML 表单中使用 method="get" 时，所有的变量名和值都会显示在 URL 中。
注释：所以在发送密码或其他敏感信息时，不应该使用这个方法！
然而，正因为变量显示在 URL 中，因此可以在收藏夹中收藏该页面。在某些情况下，这是很有用的。
注释：HTTP GET 方法不适合大型的变量值。它的值是不能超过 2000 个字符的。
*/
	
	
	//验证输入
	if(!filter_has_var(INPUT_GET, "email")) //filter_has_var() 函数检查是否存在指定输入类型的变量。
	{
		echo("没有 email 参数");
	}
	else
	{
		if (!filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL))
		{
			echo "不是一个合法的 E-Mail";
		}
		else
		{
			echo "是一个合法的 E-Mail";
		}
	}
	
	//净化输入
	if(!filter_has_var(INPUT_POST, "url"))
	{
		echo("没有 url 参数");
	}
	else
	{
		$url = filter_input(INPUT_POST, 
		"url", FILTER_SANITIZE_URL);
		echo $url;
	}
	//过滤多个输入
	//在本例中，我们使用 filter_input_array() 函数来过滤三个 GET 变量。
	//接收到的 GET 变量是一个名字、一个年龄以及一个 e-mail 地址：
	$filters = array
	(
		"name"=>array(
			"filter"=>FILTER_SANITIZE_STRING
		),
		"age"=>array(
			"filter"=>FILTER_VALIDATE_INT,
			"options"=>array
			(
				"min_range"=>1,
				"max_range"=>120
			)
		),
		"email"=>FILTER_VALIDATE_EMAIL
	);
	
	$result = filter_input_array(INPUT_GET,$filters);
	
	if(!$result["age"])
	{
		echo("年龄必须在1到120之间。<br>");
	}
	else if(!$result["email"])
	{
		echo("E-Mail 不合法<br>");
	}
	else
	{
		echo "输入正确";
	}
?>