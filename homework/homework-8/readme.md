Homework for lesson 8
=====================

Я немного доделал нашу классную работу. Что было сделано вы можете посмотреть по 
ссылке на PR (pull request).

Что было сделано:
1. Доделал класс [Router.php](https://github.com/pekhota/php-material-group2/blob/9b7b2a3fc4fb5dd70d40458f9a4c8c36ee38af53/lesson-content/simple-site-demo/framework/Router.php#L3) 
до минимального рабочего состояния.
2. Сделал [форму](https://github.com/pekhota/php-material-group2/blob/c99e69fba5ff380884cab722135801d56512cac6/lesson-content/simple-site-demo/layout/subscribe.php#L1) 
что бы можно было подписаться на рассылку сайта.
3. Добавил [обработчик](https://github.com/pekhota/php-material-group2/blob/c99e69fba5ff380884cab722135801d56512cac6/lesson-content/simple-site-demo/public/index.php#L38) 
для этой формы.
4. Добавил пример [exception'a](https://github.com/pekhota/php-material-group2/blob/c99e69fba5ff380884cab722135801d56512cac6/lesson-content/simple-site-demo/app/exceptions/NotFoundException.php#L3)
5. В обработчике вызов exception'a выглядит след. образом:
   
       $email = $_POST["email"] ?? throw new NotFoundException();

7. Тут я использовал [null coalescing оператор](https://www.php.net/manual/ru/language.operators.comparison.php#language.operators.comparison.coalesce) 

Правила оформления дз
----------------------


1. Делаете форк [моего репозитория](https://github.com/pekhota/php-material-group2).
2. В этом форке делаете всю нужную работу: см. ниже.
3. По итогу вы должны сделать PR (pull request) ко мне в ветку master.
4. PR должен называться вашими фамилией и именем латиницей.
5. В mystat'e вы должны скинуть мне ссылку на ваш PR.

В директории homework/homework-8 создаем папку с вашими фамилией и именем латиницей. 
Например в моем случае папка бы называлась pekhota-alexander.
Никаких логинов, никнеймов и прочего. 

В эту папку копируем папку lesson-content/simple-site-demo

**Всю работу делаем в этой, скопированной папке.**

Когда работа будет сделана, делаем PR (pull request) на п


Домашнее задание
----------------

1. В обработчике формы [subscribe](https://github.com/pekhota/php-material-group2/blob/c99e69fba5ff380884cab722135801d56512cac6/lesson-content/simple-site-demo/public/index.php#L38)
есть ошибка. Письма склеиваются. Вам нужно это исправить что бы каждый email был на новой строке.

Неправильно:

        alex@gmail.comexample@example.comuser@google.com

Правильно:

        alex@gmail.com
        example@example.com
        user@google.com
2. Также, нужно сделать проверку, что бы если пользователь уже есть у нас в файле,
то повторно его записывать не нужно.
3. В случае, если запись была найдена вам нужно бросать RecordExist exception.
4. На главной странице нашего сайта есть кнопка signup. Ваша задача будет след:
   1. Сделать эту кнопку ссылкой. Она должна вести на страницу /signup. 
   2. Сделать GET обработчик страницы signup. На это странице пользователь должен увидеть форму
с полями email, password и кнопкой submit. Форма должна вести на POST /signup.
   3. В обработчике вы должны писать данные формы регистрации в текстовый файл signups.txt
по аналогии с emails.txt. Не забудьте сделать так, что бы signup'ы были каждый на новой строке.
   4. И не забудьте добавить проверку на уникальность по аналогии с emails.txt. 
   5. В случае если такой пользователь уже есть в файле - бросаем UserExistException.
   
> Желаю вам успехов в выполнении ДЗ!