# Основы PHP Урок 4 ООП

## Задание: 1. Придумайте класс, который описывает любую сущность из предметной области библиотеки: книга, шкаф, комната и т.п.

[Решение](./Task1/src/)

### Описаны классы: 

* LibraryRoom - библиотечный зал
* BookShelf - стеллаж
* Rack - полка
-------------------
* IPrintedMatterIdented - интерфейс для печатных изданий
* PrintedMatter - печатное издание (реализует IPrintedMatterIdented)
* Book - книга (наследник PrintedMatter)
* EBook - Электронная книга (наследник Book)
* Magazine - Журнал (наследник PrintedMatter)
* Newspaper - Газета (наследник Magazine)
  
### Перечисления:
* BookGenres - Жанры книг
* NewspaperColor - Цветность газеты


## Задание: 2. Опишите свойства классов из п.1 (состояние).

Для всех классов определены свойства, например для класса BookShelf([bookShelf.php](./Task1/src/bookShelf.php)):


* `private int $number` - номер стеллажа
* `private array $racks` - массив полок

Для класса Book ([book.php](./Task1/src/PrintedMatter/book.php)):

* `private string $author` - Автор книги
* `private BookGenres  $genre` - Жанр книги
  
  Также наследованные свойства PrintedMatter:
* `private string $id` - идентификатор (артикул)
* `private bool $isBusy` - признак того, что издание находится на руках (в данный момент используется)
* `private string $name` - Наименование
* `private int $pages` - количество страниц
* `private string $source` - источник, адрес библиотеки или номер, если издание электронное - ссылка на скачивание

## Задание: 3. Опишите поведение классов из п.1 (методы).

Для всех классов описано поведение, например для класса libraryRoom([libraryRoom.php](./Task1/src/libraryRoom.php)):
* Конструктор, определяет как создает экземпляр данного класса.

```php
public function __construct(string $name, BookShelf ...$bookShelf)
    {
        $this->name = $name;
        foreach ($bookShelf as $item) {
            $this->bookShelves[] = $item;
        }
    } 
```




* `public function getName(): string` - возвращает имя зала

* Дабавляет новый экземпляр класса BookShelf в массив из свойств данного класса:
  ```php
      public function addNewBookShelf(int $number): BookShelf{
        $this->bookShelves[] = new BookShelf($number);
        return $this->getBookShelfByNumber($number);
    }
  ```

* Возвращает объект BookShelf или null (если такого объекта с таким номером нет в массиве) по свойству (номеру) из массива:
  ```php
      public function getBookShelfByNumber(int $number): BookShelf|null
    {
        foreach ($this->bookShelves as $bookShelf) {
            if ($bookShelf->getNumber() === $number) {
                return $bookShelf;
            }
        }
        return null;
    }
  ```

## 5. Создайте структуру классов ведения книжной номенклатуры.
### — Есть абстрактная книга.
  Реализована не абстрактная книга, а абстрактное печатное издание, все так или иначе наследуется от него [printedMatter.php](./Task1/src/PrintedMatter/printedMatter.php)
### — Есть цифровая книга, бумажная книга.
  Цифровая книга - [ebook.php](./Task1/src/PrintedMatter/ebook.php)

  Бумажная книга - [book.php](./Task1/src/PrintedMatter/book.php)
### — У каждой книги есть метод получения на руки.

В PrintedMatter ([printedMatter.php](./Task1/src/PrintedMatter/printedMatter.php)) реализовано поле `private bool $isBusy;` определяющее выдано издание на руки или находится в библиотеке.
Также реализован метод getOnHands - меняет статус поля isBusy на занят и возвращает ссылку на скачивание или адрес библиотеки

```php
    public function getOnHands(): string
    {
        $this->setIsBusy(true);
        return $this->source;
    }
```

Для формирования статистики необходимо дополнительно создать несколько сущностей, в частности: 
* Человек -> Посетитель (формуляр)
* Учетная карточка посетителя
* Журнал движения изданий

## Задание: 6. Дан код:

```php
class A {
public function foo() {
static $x = 0;
echo ++$x;
}
}

$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

```

Что он выведет на каждом шаге? Почему?

-----------------


```php
class A {
public function foo() {
static $x = 0;
echo ++$x;
}
}

$a1 = new A();
// Создаем экземпляр класса А
$a2 = new A();
// Создаем второй экземпляр класса А
$a1->foo();
// вызов метода foo() дает вывод 1, так как метод foo() в классе A
// выводит преинкремент статического поля $x класса А
$a2->foo();
// выводит 2, так как поле статическое инкремент считает от 1 
$a1->foo();
// выводит 3, аналогично с предыдущим
$a2->foo();
// выводит 4, аналогично с предыдущим

```

Немного изменим п.5

```php


class A {
public function foo() {
static $x = 0;
echo ++$x;
}
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();


```

Что он выведет теперь?

Выведет то же самое так как Класс B является наследником класса А
