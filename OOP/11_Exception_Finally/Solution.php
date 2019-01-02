<?php 

/*
FileReader - это небольшая абстракция, представляющая собой интерфейс для чтения файла.

namespace App\FileReader;

interface FileReader
{
	public function read();
	public function close();
}

Поведение у FileReader следующее. Вызов метода read() возвращает содержимое файла, связанного с данным объектом FileReader. Если в процессе чтения файла возникает ошибка, то будет брошено исключение FileReaderException. Так как FileReader использует ресурсы системы, после чтетия файла, его необходимо закрыть. Не зависимо от того была ошибка при чтении или нет. Для этого у FileReader нужно вызвать метод close().
Solution.php

Допишите функцию read. Она должна читать данные из $fileReader->read() и вызывать соответствующие функции с результатом чтения: в случае если, данные из FileReader прочитаны успешно, она должна вызывать $onSuccess, передав данные в качестве аргумента, а в случае если при чтении возникла ошибка FileReaderException, функция должна вызвать $onError, передав исключение в качестве аргумента. При этом $fileReader после чтения должен быть закрыт и в случае успеха и в случае ошибки.

** Есть структура файлов
*/

namespace App;

use App\FileReader\FileReader;
use App\FileReader\FileReaderException;

function read(FileReader $fileReader, callable $onSuccess, callable $onError)
{
  // BEGIN (write your solution here)
  try { $data = $fileReader->read();
  $onSuccess($data);
  } catch (FileReaderException $exception) {
       $onError($exception);
  } finally {
      $fileReader->close();
  }
  // END
}

