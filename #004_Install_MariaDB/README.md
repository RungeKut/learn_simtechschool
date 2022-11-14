# Install Apache
На [предыдущем шаге](https://github.com/RungeKut/learn_simtechschool/tree/main/%23003_Install_VScode#readme) мы рассмотрели установку текстового редактора VScode. Теперь приступим к установке базы данных MariaDB.
 * * *
Итак, если нашей ОС является Windows, перейдем на сайт [MariaDB Community](https://mariadb.com/downloads/).

Выберем версию и операционную систему и загрузим дистрибутив:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/0.png "general view")​

Запустим установочный файл и нажмем продолжить:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/1.png "general view")​

Принимаем лицензионное соглашение:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/2.png "general view")​

Установочные пакеты оставляем как есть:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/3.png "general view")​

Вводим пароль нашей базы данных по-умолчанию и поставим галочку разрешить удаленное подключение к базе машин для супер пользователей:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/4.png "general view")​

Имя сервера базыданных и порты подключения оставим по-умолчанию:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/5.png "general view")​

Нажимаем установить:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/6.png "general view")​

Идет процесс установки:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/7.png "general view")​

По завершению нажимаем Готово:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/8.png "general view")​

Теперь нужно проверить установку. Для этого запустим программу HeidiSQL, которая автоматически установилась вместе с сервером. Ее ярлык есть на рабочем столе:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/9.png "general view")​

Программа позволяет администрировать базыданных MariaDB:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/10.png "general view")​

Нажимаем кнопку создать подключение и введем пароль от нашей установленной базы, остальное как есть:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/11.png "general view")​

Видим, что подключение прошло успешно, значит сервер запущен корректно:

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23004_Install_MariaDB/supplementary_files/12.png "general view")​

Теперь перейдем к [следующему шагу](https://github.com/RungeKut/learn_simtechschool/tree/main/%23005_phpMyAdmin#readme) - установим веб-сервер.

[Главная страница](https://github.com/RungeKut/learn_simtechschool#readme)