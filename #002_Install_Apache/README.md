# Install Apache
На [предыдущем шаге](https://github.com/RungeKut/learn_simtechschool/tree/main/%23001_Install_PHP#readme) мы рассмотрели установку PHP. Теперь приступим к установке сервера Apache.
 * * *
Для работы с PHP нам потребуется веб-сервер. Обычно в связке с PHP применяется веб-сервер Apache. [Официальный сайт проекта](https://httpd.apache.org/). Там же можно найти всю подробную информацию о релизах, скачать исходный код. Однако официальный сайт не предоставляет готовых сборок для ОС Windows.

Перед установкой Apache следует отметить, что если наша ОС Windows, то в системе должны быть установлен пакет для C++, который можно найти по адресу для [64-битной](https://aka.ms/vs/16/release/VC_redist.x64.exe) и для [32-битной](https://aka.ms/vs/16/release/VC_redist.x86.exe).

Итак, если нашей ОС является Windows, перейдем на сайт, который предоставляет [дистрибутивы Apache для Windows](https://www.apachelounge.com/download/):

![Image alt](https://github.com/RungeKut/learn_simtechschool/blob/main/%23002_Install_Apache/supplementary_files/1.png "general view")​

В подпункте **Apache 2.4 binaries VS16** выберем последнюю версию дистрибутива сервера. На странице загрузок мы можем найти две версии пакета Apache - для 64-битных систем и для 32-битных.

После загрузки пакета с Apache распакуем загруженный архив. В нем найдем папку непосредственно с файлами веб-сервера - каталог **Apache24**. Переместим данный каталог на диск C, чтобы полный путь к каталогу составлял **C:/Apache24**.

###Запуск Apache

В распакованном архиве в папке **bin** найдем файл **httpd.exe**


Теперь перейдем к [следующему шагу](https://github.com/RungeKut/learn_simtechschool/tree/main/%23002_Install_Apache#readme) - установим веб-сервер.

[Главная страница](https://github.com/RungeKut/learn_simtechschool#readme)