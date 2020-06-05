<?php
$dbms='mysql';     //数据库类型
$host='192.168.99.151'; //数据库主机名
$dbName='etoles2018sch';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='Mysqlw0000w';          //对应的密码
$dsn="$dbms:host=$host;port=33000;dbname=$dbName";


try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";
    /*你还可以进行一次搜索操作*/
    foreach ($dbh->query('SELECT * from etoles_users limit 1') as $row) {
        print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
    }
    
    $dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}