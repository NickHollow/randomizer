<h2>Randomizer Help</h2>
<h3>Общие положения</h3>
<p>
В тексте нельзя использовать символы {, |, } не в качестве служебных для рандомизатора!<br>
Все операторы можно вкладывать друг в друга.
</p>
<h3>{|||}</h3>
<p>
Оператор выбора одного из выражений. Примеры:<br>
{a|b|c}
<ul>
<li>a (вероятность 33%)</li>
<li>b (вероятность 33%)</li>
<li>c (вероятность 33%)</li>
</ul>
{a|b {c|d}}
<ul>
<li>a (вероятность 50%)</li>
<li>b c (вероятность 25%)</li>
<li>b d (вероятность 25%)</li>
</ul>
</p>
<h3>{|{|}}</h3>
<p>
Оператор понижения вероятности - один из вариантов использования оператора выбора.
Если написать {a|{a|b}}, то выражение a выпадет с вероятностью 75%, а b - 25%.
</p>
<h3>{%Q=(N,S) a|b|c}</h3>
<p>
Оператор последовательности. Создает случайную последовательность из N уникальных элементов, разделяя их S. Примеры:<br>
{%Q=(2,, ) a|b|c}
<ul>
<li>a, b</li>
<li>a, c</li>
<li>b, a</li>
<li>b, c</li>
<li>c, a</li>
<li>c, b</li>
</ul>
</p>
<h3>{%R=(S) a|b|c}</h3>
<p>
Оператор перемешивания. Создает случайную последовательность из всех элементов, разделяя их S. Примеры:<br>
{%R=(, ) a|b|c}
<ul>
<li>a, b</li>
<li>a, c</li>
<li>b, a</li>
<li>b, c</li>
<li>c, a</li>
<li>c, b</li>
</ul>
</p>
<h3>raw[S]</h3>
<p>
Оператор "сырого" текста. Не обрабатывает текст S внутри. В тексте S запрещен символ ]. Для вывода слова raw[], например,
нужно использовать следующую конструкцию: raw[raw][].
</p>

<?php
include 'Randomizer.php';
echo Randomizer::get_instance()
	->content("тестовый raw[{текст}] {уровень raw[{|}]]|{%Q=(2,, ) {текст|контент}|{строка|слово}}} {%R=(, ) {слово1|или слово1}|слово2|слово3} raw[raw][]")
	->make();
?>
