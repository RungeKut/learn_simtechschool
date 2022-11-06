# Install Apache
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

Распакуем загруженный архив в папку, которую назовем php. Пусть эта папка у нас будет располагаться в корне диска C.

Теперь нам надо выполнить минимальную конфигурацию PHP. Для этого зайдем в распакованный архив и найдем там файл php.ini-development. Это файл начальной конфигурации интерпретатора.

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23001_Install_PHP/supplementary_files/2.png "general view")​

Переименуем этот файл в php.ini и затем откроем его в текстовом редакторе.

Найдем в файле строку:

    extension_dir = "ext"

Эта строка указывает на каталог с подключаемыми расширениями для PHP. Расширения позволяют задействовать нам некоторую дополнительную функциональность, например, работу с базой данных. Все расширения находятся в распакованном каталоге ext.

Раскомментируем эту строку, убрав точку с запятой и укажем полный путь к папке расширений php:

    extension_dir = "C:\php\ext"

Остальное содержимое файла оставим без изменений.

Теперь перейдем к следующему шагу - установим веб-сервер.