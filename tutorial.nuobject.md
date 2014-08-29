Karena Thread  sebelumnya jadi HT di group ini, sebagai ucapan terimakasih saya ingin memberikan sedikit tutorial tentang:

PHP -> Prototype Javascript Style 

Sangat berguna sekali untuk Object Oriented Programming yang dinamis simple dan mudah untuk mendevelop plugin sendiri, 

download dulu classnya di https://github.com/nubuntu/ncframework/blob/master/NUObject.php
nanti framework saya menggunakan object ini, (kalo jadi dibuat :D )

contoh anggap saja saya sedang membuat aplikasi translator dengan bahasa utamanya bahasa inggris


$english = new NUObject(array(
	'init'=>true,
	'hello'=>'Hello World',
	'greeting'=>'Welcome...',
	'say'=>function($self){
		return $self::$base->greeting.", ".$self::$base->hello;
	}
));

echo $english->say();

notes: untuk main object, harus disertai init=true untuk menandakan

kemudian saya buat plugin untuk bahasa indonesianya, tinggal diextend aja seperti diJQUery

$indonesia = new NUObject(array(
	'hello'=>'Halo Dunia',
	'greeting'=>'Selamat Datang...'
));

echo $english->say();

kemudian saya buat plugin lagi untuk bahasa jawanya tinggal extend lagi

$jawa = new NUObject(array(
	'hello'=>'Halo Dunyo',
	'greeting'=>'Sugeng Riyadi...'
));

echo $english->say();

contoh lengkapnya:

$english = new NUObject(array(
	'init'=>true,
	'hello'=>'Hello World',
	'greeting'=>'Welcome...',
	'say'=>function($self){
		return $self::$base->greeting.", ".$self::$base->hello;
	}
));
echo $english->say();
$indonesia = new NUObject(array(
	'hello'=>'Halo Dunia',
	'greeting'=>'Selamat Datang...'
));
echo "<br/>";
echo $english->say();

$jawa = new NUObject(array(
	'hello'=>'Halo Dunyo',
	'greeting'=>'Sugeng Riyadi...'
));
echo "<br/>";
echo $english->say();
