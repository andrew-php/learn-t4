# t4. Первое домашнее задание
Впервые сдаю задание на проверку, поэтому не знаю насколько подробные объяснения нужно писать. На всякий случай написал подробно и по пунктам:

1. \+
2. \+
3. В индекс-контролллере пробросил название из конфига в шаблон через <code>$this->data</code>
4. <code>Templates\Index\Default.html</code> наследник <code>Layouts\Index.html</code>
Название приложения вывел в title <code>Layouts\Index.html</code>
5. \+
6. <code>T4\Mvc\Application</code> метод <code>run()</code>, далее <code>init()</code>, далее <code>initExtensions()</code>, далее <code>\T4\Mvc\Extensions\Bootstrap\Extension</code> метод <code>init()</code>, а там уже задаются js и css файлы в зависимости от заданной в конфиге темы. Затем js и сss выводятся в <code>Layouts\Index.html</code> через <code>{{ publishCss() }}</code> и <code>{{ publishJs() }}</code>



