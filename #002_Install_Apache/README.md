# Install Apache
На [предыдущем шаге](https://github.com/RungeKut/learn_simtechschool/tree/main/%23001_Install_PHP#readme) мы рассмотрели установку PHP. Теперь приступим к установке сервера Apache.
 * * *
Для работы с PHP нам потребуется веб-сервер. Обычно в связке с PHP применяется веб-сервер Apache. [Официальный сайт проекта](https://httpd.apache.org/). Там же можно найти всю подробную информацию о релизах, скачать исходный код. Однако официальный сайт не предоставляет готовых сборок для ОС Windows.

Перед установкой Apache следует отметить, что если наша ОС - Windows, то в системе должны быть установлен пакет для C++, который можно найти по адресу для [64-битной](https://aka.ms/vs/16/release/VC_redist.x64.exe) и для [32-битной](https://aka.ms/vs/16/release/VC_redist.x86.exe).

Итак, если нашей ОС является Windows, перейдем на сайт, который предоставляет [дистрибутивы Apache для Windows](https://www.apachelounge.com/download/):

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/1.png "general view")​

В подпункте ***Apache 2.4 binaries VS16*** выберем последнюю версию дистрибутива сервера. На странице загрузок мы можем найти две версии пакета Apache - для 64-битных систем и для 32-битных.

После загрузки пакета с Apache распакуем загруженный архив. В нем найдем папку непосредственно с файлами веб-сервера - каталог ***Apache24***. Переместим данный каталог на диск C, чтобы полный путь к каталогу составлял ***C:/Apache24***.

### Запуск Apache

В распакованном архиве в папке ***bin*** найдем файл ***httpd.exe***

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/2.png "general view")​

Это исполняемый файл сервера. Запустим его. Нам должна открыться следующая консоль:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/3.png "general view")​

Пока работает это приложение, мы можем обращаться к серверу. Для его тестирования введем в веб-браузере адрес:

    http:\localhost
    
После этого веб-браузер должен отобразить следующую страницу:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/4.png "general view")​

Эта страница символизирует, что наш веб-сервер работает, и мы можем с ним работать.

### Конфигурация веб-сервера

Теперь проведем конфигурацию сервера, чтобы связать его с ранее установленным интерпретатором PHP.. Для этого найдем в папке веб-сервера в каталоге conf **(то есть C:\Apache24\conf )** файл ***httpd.conf***

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/5.png "general view")​

Откроем этот файл в текстовом редакторе. ***httpd.conf*** - настраивает поведение веб-сервера. Мы не будем подобно затрагивать его описания, а только лишь произведем небольшие изменения, которые потребуются нам для работы с PHP.

Прежде всего подключим PHP. Для этого нам надо подключить модуль php, предназначенный для работы с apache. В частности, в папке ***php*** мы можем найти файл ***php8apache2_4.dll***:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/6.png "general view")​

Для подключения php найдем в файле ***httpd.conf*** конец блока загрузки модулей ***LoadModule***:

    //......................
    #LoadModule vhost_alias_module modules/mod_vhost_alias.so
    #LoadModule watchdog_module modules/mod_watchdog.so
    #LoadModule xml2enc_module modules/mod_xml2enc.so

И в конце этого блока добавим строчки:

    LoadModule php_module "C:/php/php8apache2_4.dll"
    PHPIniDir "C:/php"

Далее укажем место, где у нас будут храниться сайты. Для этого создадим, например, на диске **С** каталог ***localhost***. Затем найдем в файле ***httpd.conf*** строку:

    DocumentRoot "${SRVROOT}/htdocs"
    <Directory "${SRVROOT}/htdocs">

По умолчанию в качестве хранилища документов используется каталог **"c:/Apache24/htdocs"**. Заменим эту строку на следующую:

    DocumentRoot "c:/localhost"
    <Directory "c:/localhost">

Изменим пути файлам, в которые будут заноситься сведения об ошибках или посещении сайта. Для этого найдем строку:

    ErrorLog "logs/error.log"

И заменим ее на:
	
    ErrorLog "c:/localhost/error.log"

Далее найдем строку:
	
    CustomLog "logs/access.log" common

И заменим ее на:
	
    CustomLog "c:/localhost/access.log" common

Таким образом, файл ***error.log***, в который записываются ошибки, и файл ***access.log***, в который заносятся все данные о посещении веб-сайта, будут располагаться в папке ***c:/localhost***.

Затем найдем строчку:
	
    #ServerName www.example.com:80

И заменим ее на:
	
    ServerName localhost

Далее найдем блок <IfModule mime_module>:
	
    <IfModule mime_module>
        #
        # TypesConfig points to the file containing the list of mappings from
        # filename extension to MIME-type.
        #
        TypesConfig conf/mime.types

И под строкой <IfModule mime_module> добавим две строчки:
	
    AddType application/x-httpd-php .php
    AddType application/x-httpd-php-source .phps

То есть должно получиться:
	
    <IfModule mime_module>
        AddType application/x-httpd-php .php
        AddType application/x-httpd-php-source .phps
        #
        # TypesConfig points to the file containing the list of mappings from
        # filename extension to MIME-type.
        #
        TypesConfig conf/mime.types

В данном случае мы добавили поддержку для файлов с расширением ***.php*** и ***.phps***.

И в конце найдем блок <IfModule dir_module>:
	
    <IfModule dir_module>
        DirectoryIndex index.html
    </IfModule>

И заменим его на следующий:

    <IfModule dir_module>
        DirectoryIndex index.html index.php
    </IfModule>

В данном случае мы определяем файлы, которые будут выполняться при обращении к корню файла или каталога. То есть по сути определяем главные страницы веб-сайта: ***index.html*** и ***index.php***.

Это минимально необходимая конфигурация, которая нужна для работы с PHP.

Теперь наша задача - убедиться, что php подключен и работает правильно. Для этого перейдем в папку ***c:/localhost***, которую мы создали для хранения файлов веб-сервера, и добавим в нее обычный текстовый файл. Переименуем его в ***index.php*** и внесем в него следующее содержание:

    <?php
    phpinfo();
    ?>

В данном случае мы создали простейший скрипт, который выводит общую информацию о PHP.

Теперь заново запустим файл ***httpd.exe*** и обратимся к этому скрипту, набрав в строке браузера адрес:

    http://localhost/index.php

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/7.png "general view")​

Что тут произошло? При обращении к сайту на локальной машине в качестве адреса указывается:

    http://localhost
    
Затем указывается имя ресурса, к которому идет обращение. В данном случае в качестве ресурса используется файл ***index.php***. И так как в файле ***httpd.conf*** в качестве хранилища документов веб-сервера указан каталог ***C:\localhost***, то именно в этом каталоге и будет веб-сервер будет производить поиск нужных файлов.

И поскольку выше при конфигурировании мы указали, что в качестве главной страницы может использоваться файл ***index.php***, то мы можем также обратиться к этому ресурсу просто:

    http://localhost/

Таким образом, теперь мы можем создавать свои сайты на php.

### Установка веб-сервера в качестве службы

Если мы часто работаем с веб-сервером, в том числе для программиррования на PHP, то постоянно запускать таким образом сервер, может быть утомительно. И в качестве альтернативы мы можем установить Apache в качестве службы Windows. Для этого запустим командную строку Windows от имени администратора и установим Apache в качестве службы с помощью команды:

    C:\Apache24\bin\httpd.exe -k install

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/8.png "general view")​

То есть в данном случае прописываем полный путь к файлу ***httpd.exe*** (C:\Apache24\bin\httpd.exe) и далее указываем команду на установку службы ***-k install***.

Если установка завершится удачно, то в командная строка отобразит сообщение "The Apache2.4 service is successfully installed". Также будет проведено тестирование сервера.

После установки службы убедимся, что она запущена

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/9.png "general view")​

Теперь перейдем к [следующему шагу](https://github.com/RungeKut/learn_simtechschool/tree/main/%23003_Install_VScode#readme) - установим текстовый редактор.

[Главная страница](https://github.com/RungeKut/learn_simtechschool#readme)