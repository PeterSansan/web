你好，我是PHP，今天是来介绍基础的

<?php 

	//一、显示变量与数据类型
	$x = 5985;
	var_dump($x);
	echo "<br>"; 
	$x = -345; // 负数 
	var_dump($x);
	echo "<br>"; 
	$x = 0x8C; // 十六进制数
	var_dump($x);
	echo "<br>";
	$x = 047; // 八进制数
	var_dump($x);

	//二、常量，全局的
	define("NAME"," 彼得三三");

	//三、函数
	function myTest()
	{
		echo NAME;
	}
	myTest();
	echo NAME;
	echo "<br>";
	//四、字符串变量
	//并置运算符
	$txt1 = "Hello world!";
	$txt2 = "What a nice day!";
	echo $txt1."".$txt2;
	//PHP strlen()函数
	echo strlen("Hello World!");
	echo "<br>";
	//PHP strpos(),查找字符
	echo strpos("Hello World!","World");
	echo "<br>";
	//string函数大全
	echo "<a href=http://www.runoob.com/php/php-ref-string.html>string函数大全</a>";
	echo "<br>";
	//五、递增/递减运算符
	
	$x=10;
	echo ++$x;//输出11
	echo "<br>";
	$y=10;
	echo $y++; //输出10
	echo "<br>";
	
	//输出时间
	$t = date("H"); //输出日
	echo $t;
	echo "<br>";
	
	//六、数组
	//数值数组
	$cars = array("Volvo","BMW","Toyota");
	echo "I like ".$cars[0].", ".$cars[1]." and ".$cars[2].".";
	echo "<br>";
	echo "这个数据的长度是:".count($cars);
	echo "<br>";
	//关联数组
	$age = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");//或$age['Peter']="35";$age['Ben']="37";
	//遍历关联数组
	foreach($age as $x=>$x_value)
	{
		echo "Key" . $x.", VAlue=".$x_value;
		echo "<br>";
	}
	//七、数组排序
	$cars = array("Volvo","BMW","Toyota");
	$numbers=array(4,6,2,22,11);
	sort($cars);	//对字母进行升序排列
	sort($numbers); //对数字进行长序排列
	sort($cars);  	//对数组进行降序排列
	print_r($numbers); 
	
	//$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");//asort()-根据数组的值，对数组进行升序排列
	//asort($age);
	
	//$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");//ksort()-根据数组的键，对数组进行升序排列
	//ksort($age);
	
	//$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");//arsort()-根据数组的值，对数组进行降序排列
	//arsort($age);
	
	//$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");//krsort()-根据数组的键，对数组进行降序排列
	//krsort($age);
	echo "<br>";
	
	//八、超级全局变量
	//$GLOBALS 
	$xx = 75;
	$yy = 34;
	
	function addition()
	{
		$GLOBALS['zz'] = $GLOBALS['xx'] + $GLOBALS['yy'];
	}
	addition();
	echo $zz."<br>";
	
	//$_SERVER,是一个包含了诸如头信息(header)、路径(path)、以及脚本位置等等信息的数组。
	echo $_SERVER['SERVER_NAME'];
	echo "<br>";
	echo $_SERVER['SCRIPT_FILENAME']."<br>";
	//$_REQUEST、$_POST、$_GET、$_FILES、$_ENV、$_COOKIE、$SESSION等以后再看
	
	//九、foreach
	$x = array("one","two","three");
	foreach($x as $value)
	{
		echo $value."<br>";
	}
	//十、函数
	//PHP的真正威力源自于它的函数,在PHP中，提价节超过了1000个内键的函数
	//自建函数
	function writeName($fname)
	{
		echo "你的名字是".$fname."吗？"."<br>";
	}
	
	writeName("夏娜");
	//十一、魔术变量
	echo "这是第".__LINE__."行"."<br>";//显示行数
	echo "该文件位于".__FILE__."<br>";//显示绝对路径
	echo "该文件位于".__DIR__."<br>";//文件所在目录
	//__FUNCTION__函数名称；__CLASS__类的名称；__TRAIT__ Trait名包括其被声明的作用区域
	//__METHOD__类的方法名；__NAMESPACE__命名空间的名称
	//十一、命名空间，以后再来
	//十二、面向对象OOP
	//类定义
	/*class phpClass{
		var $var1;
		var &var2 = "constant string";
		
		function myfunc(&arg1,&arg2);
	}*/
	//实例
	class Site{
		/*成员变量*/
		var $url;	//var等同于publics
		var $title;
		
		/*构造函数,一旦建立的构造函数，创建对象就要用构造函数声明*/
		public function __construct($par1,$par2){
			$this->url = $par1;
			$this->title = $par2;
			echo "AAAAAAAAAAAAAAAAA"."<br>";
		}
		/*析构函数*/
		function __destruct(){
			//print "销毁".$this->url.$this->title."\n";
		}
		/*成员函数*/
		function setUrl($par){
			$this->url=$par;//插入换行符
		}
		
		function getUrl(){
			echo $this->url.PHP_EOL;
		}
		
		function setTitle($par){
			$this->title=$par;
		}
		
		function getTitle(){
			echo $this->title.PHP_EOL;
		}
	}
	/*继承：子类扩展站点类别,PHP不支持多继承,子类的构造函数默认来自于父类*/
	class Child_Site extends Site{
		var $category;
		function setCate($par){
			$this->category = $par;
		}
		function getCate(){
			echo $this->category.PHP_EOL;
		}
		//方法重写:子类对父类方法重写
		function getUrl(){
			echo $this->url.PHP_EOL;
			return $this->url;
		}
	}
	//创建对象
	$baidu = new Site('1','a');
	$taobao = new Site('2','b');
	$google = new Site('3','c');
	$sina = new Child_Site("4","d");

	
	//调用成员函数，设置标题和URL
	$baidu->setTitle("百度");
	$taobao->setTitle("淘宝");
	$google->setTitle("谷歌");
	$sina->setCate("新闻");
	
	$baidu->setUrl('www.baidu.com');
	$taobao->setUrl('www.taobao.com');
	$google->setUrl('www.google.com');
	
	//调用成员函数，获取标题和URL
	$baidu->getTitle();
	$taobao->getTitle();
	$google->getTitle();
	$sina->getCate();

	
	$baidu->getUrl();
	$taobao->getUrl();
	$google->getUrl();
	
	//接口,interface关键字。类中必须实现接口中定义的所有方法，否则会报一个致使错误，类可以实现多个接口，用逗号来分隔多个接口的名称
	interface iTemplate
	{
		public function setVariable($name,$var);
		public function getHtml($template);
	}
	//实现接口
	
	class Template implements iTemplate
	{
		private $vars = array();
		
		public function setVariable($name,$var)
		{
			$this->vars[$name] = $var;
		}
		public function getHtml($template)
		{
			foreach($this->vars as $name => $value){
				$template = str_replace('{'.$name.'}',$value,$template);
			}
			return $template;
		}
	}
	
	//抽象类 --以后再来
	abstract class AbstractClass
	{
		// 强制要求子类定义这些方法
		abstract protected function getValue();
		abstract protected function prefixValue($prefix);

		// 普通方法（非抽象方法）
		public function printOut() {
			print $this->getValue() . PHP_EOL;
		}
	}
	
	//Static关键字，不用实例化类而直接访问
	//Final关键字，如果父类中的方法被声明为final,则子类无法覆盖该方法，如果一个类被声明为final,则不能被继承。
	
	//十三、include和require语句
	echo "<br>"."来自include文件"."<br>";
	include'menu.php';
	
	//十四、文件处理
	$file=fopen("file.txt","r") or exit("Unable to open file!");
	
	//执行一些代码
	// 读取文件每一行，直到文件结尾
	while(!feof($file))
	{
		echo fgets($file). "<br>";
	}
	//逐字符读取文件
	/* while (!feof($file))
	{
		echo fgetc($file);
	 }*/
	fclose($file);
	
		
?> 
	<!--//十五、上传文件-->
	<form action="upload_file.php" method="post" enctype="multipart/form-data">
		<label for="file">文件名：</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit" value="提交">
	</form>

<?php
	/*十六、Cookie*/
	//设置Cookie
	$expire=time()+60*60*24*30;   //设置一个月后失效
	//setcookie("user", "petersans", $expire);
	
	// 输出 cookie 值
	if(isset($_COOKIE["user"])) //利用isset函数来确认是否已设置了cookie	
		echo "欢迎".$_COOKIE["user"]."!<br>";
	else 
	{
		setcookie("user","petersans",$expire);//如果没有user这个cookie,就新建一个，名称是可以的，值另起一个，不要重复
		echo "第一次访问，普通访客！<br>";
	}	
	//echo $_COOKIE["user"];

	// 查看所有 cookie
	print_r($_COOKIE);
	
	//删除cookie
	//setcookie("user","",time()-3600);
	
	//十七、Session变量
	session_start();	//session启动
	echo "<br>";
	if(isset($_SESSION['views']))
	{
		$_SESSION['views']=$_SESSION['views']+1;
	}
	else
	{
		$_SESSION['views']=1;//存储session数据
	}
	
	echo "同一台电脑浏览量:".$_SESSION['views']."<br>";		//这样就可以看浏览量了
	print_r($_SESSION);
	//销毁Session
	//session_destroy();
	
	//f十八、过滤器 后端验证
	//f过滤变量
	//filter_var() - 通过一个指定的过滤器来过滤单一的变量
	//filter_var_array() - 通过相同的或不同的过滤器来过滤多个变量
	//filter_input - 获取一个输入变量，并对它进行过滤
	//filter_input_array - 获取多个输入变量，并通过相同的或不同的过滤器对它们进行过滤
	$intnum = 123;
	if(!filter_var($intnum,FILTER_VALIDATE_INT))
		echo "<br>不是一个合法的整数<br>";
	else
	{
		echo "<br>是一个合法的整数<br>";
	}
	
	//过滤器选项和标志
	$var = 300;
	
	$int_options = array(
		"options"=>array(
			"min_range"=>0,
			"max-range"=>256
		)
	);
	
	if(!filter_var($var,FILTER_VALIDATE_INT,$int_options))
		echo "不是一个合法的整数<br>";
	else 
		echo "是一个合法的整数<br>";
	
	//验证输入
	//下面的实例有一个通过 "GET" 方法传送的输入变量 (email)：
	if(!filter_has_var(INPUT_GET, "email"))
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
	//净化输入，见表单提交篇
	//自定义过滤函数Filter Callback
	function convertSpace($string)
	{
		return str_replace("_", ".", $string);
	}
 
	$string = "www_runoob_com!";
	 
	echo filter_var($string, FILTER_CALLBACK,
	array("options"=>"convertSpace"));
	//还有高级过滤器，以后有机会再来
?>























