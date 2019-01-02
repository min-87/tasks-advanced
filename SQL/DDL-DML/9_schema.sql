--Выполните в psql следующие запросы:

  --  Создание схемы custom.
  --  Создание последовательности serial в новой схеме.

DROP SEQUENCE IF EXISTS custom.serial;
DROP SCHEMA IF EXISTS custom;

-- BEGIN (write your solution here)
CREATE SCHEMA custom;
CREATE SEQUENCE custom.serial;
-- END

