# DataEncrypted
Framework PHP for Data encryption for form anti bot form submit

#use
You have 3 functions is a construct that is.

# I - Construct
First you have the linker construct function (array ), This function allows you to initialize the Elements encrypting.

example: 
```PHP
require_once 'DataEncrypted/DataEncrypted.class.php';
$data = new DataEncrypted(["email", "name"]); // function construct to encrypte data
```

# II - Read_DataToEncrypted
Secondly , you have the Read_DataToEncrypted function (STRING) this function allows you to get the encrypted code of an element.

example: 
```PHP
require_once 'DataEncrypted/DataEncrypted.class.php';
$data = new DataEncrypted(["email", "name"]); // function construct to encrypte data
$data->Read_DataToEncrypted("name"); // this return a encrypted code
```
# III - Read_EncryptedToData
Third, you have the Read_EncryptedToData function (STRING) this function allows you to get the translation of an encrypted code.

example: 
```PHP
require_once 'DataEncrypted/DataEncrypted.class.php';
$data = new DataEncrypted(["email", "name"]); // function construct to encrypte data
$data->Read_EncryptedToData("0WsETz9X3EaOtKezCZy4"); // this return a translation code
```
