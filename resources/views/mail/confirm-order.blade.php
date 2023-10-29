<!DOCTYPE html>
<html>
<head>
    <title>Заказ отправлен</title>
</head>
<body>
<h1>Ваш заказ принят, с вами свяжется менеджер по вопросам доставки товара</h1>

<ul>
    <h2>Ваш заказ</h2>
    @foreach ($products as $product)
        <li>
            Наименование: {{ $product['title'] }}
            Количество: {{ $product['quantity']}}

        </li>


    @endforeach

    <h2>Общая стоимость: {{ $fullPrice }} бел.руб.</h2>
    <h2>Благодарим за сотрудничество!</h2>
</ul>
</body>
</html>