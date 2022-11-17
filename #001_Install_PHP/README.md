# Install PHP
Есть разные способы установки всего необходимого программного обеспечения. Мы можем устанавливать компоненты по отдельности, а можем использовать уже готовые сборки на подобие Denwer или EasyPHP. В подобных сборках компоненты уже имеют начальную настройку и уже готовы для создания сайтов. Однако рано или поздно разработчикам все равно приходится прибегать к установке и конфигурации отдельных компонентов, подключения других модулей. Поэтому мы будем устанавливать все компоненты по отдельности. В качестве операционной системы будет использоваться Windows.

Что подразумевает установка PHP? Во-первых, нам нужен интерпретатор PHP. Во-вторых, необходим веб-сервер, например, Apache, с помощью которого мы сможем обращаться к ресурсам создаваемого нами сайта.
 * * *
Для установки PHP перейдем на офсайт разработчиков.

[Supported Versions](https://www.php.net/downloads)

На странице загрузок мы можем найти различные дистрибутивы для операционной системы Linux.

Если нашей операционной системой является Windows, то нам надо загрузить один из пакетов со страницы

[PHP For Windows](https://windows.php.net/download)

Загрузим zip-пакет последнего выпуска PHP, учитывая разрядность операционной системы, на которую надо установить PHP.

Интерпретатор PHP имеет две версии: Non Thread Safe и Thread Safe.

В чем разница между ними? Версия Thread Safe позволяет задействовать многопоточность, тогда как Non Thread Safe - однопоточная версия. Выбрем версию Thread Safe.

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/1.jpg "general view")​

Распакуем загруженный архив в папку, которую назовем php. Пусть эта папка у нас будет располагаться на диске **C** в папке **webworks**.

Теперь нам надо выполнить минимальную конфигурацию PHP. Для этого зайдем в распакованный архив и найдем там файл php.ini-development. Это файл начальной конфигурации интерпретатора.

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/2.png "general view")​

Переименуем этот файл в **php.ini** и затем откроем его в текстовом редакторе.

Найдем в файле строку (Она может быть закоментирована знаком ;):

    ; extension_dir = "ext"

Эта строка указывает на каталог с подключаемыми расширениями для PHP. Расширения позволяют задействовать нам некоторую дополнительную функциональность, например, работу с базой данных. Все расширения находятся в распакованном каталоге ext.

Раскомментируем эту строку, убрав точку с запятой и укажем полный путь к папке расширений php:

    extension_dir = "C:\webworks\php\ext"

И установим следующие параметры:
    max_execution_time = 600
    memory_limit = 512M
    post_max_size = 128M
    upload_max_filesize = 128M

Раскоментируем следующие расширения:
    extension=bz2
    extension=curl
    extension=fileinfo
    extension=gd
    extension=gettext
    extension=gmp
    extension=intl
    extension=mbstring
    extension=exif
    extension=mysqli
    extension=openssl
    extension=pdo_mysql
    extension=soap
    extension=sockets
    extension=sqlite3
    extension=xsl

Остальное содержимое файла оставим без изменений и сохраним.

Далее нужно прописать эту директорию в переменные окружения **path**.

Зайдем в **Свойства системы** через окно **Выполнить**. Нажимаем кнопки **Win + R**, и вводим команду **sysdm.cpl**, и жмем **ОК**. 

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/3.png "general view")​

Перейдем на вкладку дополнительно и нажмем кнопку **Переменные среды...**:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/4.png "general view")​

Находим переменную **Path**:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/5.png "general view")​

Нажимаем **Изменить**:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/6.png "general view")​

Добавляем суда директорию в которую был установлен PHP. Нажимаем **Создать** и прописываем путь:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/7.png "general view")​

Далее везде нажимаем **ОК**. Это нужно для того чтобы интерпретатор языка PHP был доступен в операционной системе из командной строки.

Чтобы это проверить можно окрыть интегрированную среду скриптов Windows PowerShell® через окно **Выполнить**. Нажимаем кнопки **Win + R**, и вводим команду **powershell**, и жмем **ОК**. Введем здесь следующую команду:
    php -v

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/8.png "general view")​

Видим информацию о версии установленного интерпретатора - это означает, PHP теперь доступен в системе.

Теперь установим раширение для языка PHP - **Xdebug**. Перейдем на [страницу загрузки](https://xdebug.org/download) и выбираем версию нашего PHP с припиской TS(thread safe):

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/9.png "general view")​

Далее скачаный вайл с расширением **.dll** нам нужно поместить в директорию **C:\webworks\php\ext**. Файл для удобства можно переименовать как **php_xdebug.dll**:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/10.png "general view")​

Теперь на нужно его подключить в файле **php.ini**, в котором выше мы раскоментировали extention=... В этой области нам нужно добавить строчку:
    zend_extension=php_xdebug.dll

Должно получиться вот так:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/11.png "general view")​

Сохраняем **php.ini** и проверяем что у нас получилось:

Вернемся к окну **powershell** и введем команду:
    php -i

Ошибок в [выводе](https://github.com/RungeKut/learn_simtechschool/tree/main/%23001_Install_PHP#php_i) команды не обнаруживаем. На всякий случай еще введем команду:
    php

Вывод должен быть пустой - это значит что все хорошо.

Теперь перейдем к [следующему шагу](https://github.com/RungeKut/learn_simtechschool/tree/main/%23002_Install_Apache#readme) - установим веб-сервер.

[Главная страница](https://github.com/RungeKut/learn_simtechschool#readme)